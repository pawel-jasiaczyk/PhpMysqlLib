<?php 
declare(strict_types=1);
namespace PhpMysqlLib;
require_once( 'includes.inc' );

class Column
{
    //------------------------------------------------------------------------------------------------------------------
    #region Private fields

    private $dataType;
    private $columnName;


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Accessors

    public function setDataType( DataType $dataType )
    {
        $this->dataType = $dataType;
    }


    public function getDataType() : DataType
    {
        return $this->dataType;
    }


    public function setColumnName( string $columnName )
    {
        $this->columnName = $columnName;
    }


    public function getColumnName() : string
    {
        return $this->columnName;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Constructors

    public function __construct( Datatype $dataType, string $columnName )
    {
        $this->setColumnName( $columnName );
        $this->setDataType( $dataType );
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Magic Methods

    public function __toString()
    {
        $result = "[ columnName = $this->columnName, dataType = " . (string)$this->dataType . " ]";
        return $result;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------
}
