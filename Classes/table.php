<?php 
declare(strict_types=1);

namespace PhpMysqlLib;
require_once( "includes.inc" );

class Table
{
    //------------------------------------------------------------------------------------------------------------------
    #region Private Fields

    private $name;
    private $columns;

    private $numberOfColumns;


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Accessors

    public function getName()
    {
        return $this->name;
    }


    public function setName( string $name )
    {
        $this->name = $name;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Public Methods

    public function addColumn( Column $column) : bool
    {
        if( $this->checkIfColumnNameExist( $column->getColumnName() ) )
        {
            return FALSE;
        }
        else
        {
            array_push( $this->columns, $column );
            return TRUE;
        }
    }


    public function addColumnAtPosition( Column $column, int $position) : bool
    {
        if( $this->checkIfColumnNameExist( $column ) )
        {
            return FALSE;
        }
        else
        {
            array_slice( $this->columns, $position, 0, $column );
            return TRUE;
        }
    }


    public function checkIfColumnNameExist( string $columnName ) : bool
    {
        if( $this->getColumnByName( $columnName ) != NULL )
            return TRUE;
        else
            return FALSE;
    }


    public function getColumnByName( string $columnName ) : ?Column
    {
        foreach( $this->columns as $c )
        {
            if( is_a( $c, "Column" ) )
            {
                if( $c->getColumnName() === $columnName )
                {
                    return $c;
                }
            }
            else
            {
                //TODO throw exception here - inconsistent data type in $columns
            }
        }
        return NULL;
    }


    public function getColumnByNumber( int $columnNumber ) : ?Column
    {
        if( $columnNumber < count( $this->columns) && $columnNumber >= 0 )
        {
            if( is_a( $this->columns[ $columnNumber ], "Column" ) )
                return $this->columns[ $columnNumber ];
            else
            {
                //TODO throw exception here - inconsistent data type in $columns
            }
        }
        return NULL;
    }

    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Private Methods
    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Constructors

    public function __construct( string $name )
    {
        $this->columns = array();
        $this->name = $name;
    }

    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Magic Methods

    public function __toString()
    {
        $result = "[";
        $result .= "name = " . $this->name . ", \n";
        if( is_array( $this->columns ) )
        {
            $result .= "columns = array [\n";
            foreach( $this->columns as $n=>$c )
            {
                $result .= "\t$n->" . (string)$c . "\n";
            }
            $result .= "]\n";
        }
        else
        {
            $result .= (string)$this->columns;
        }


        return $result;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------
}