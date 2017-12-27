<?php
declare(strict_types=1);
namespace PhpMysqlLib;
require_once( 'includes.inc' );

class DataType implements IValidatable
{
    //------------------------------------------------------------------------------------------------------------------
    #region Private fields

    private $dataType;
    private $paramOne;
    private $paramTwo;

    private $numberOfParams;
    private $requiredNumberOfParams;
    // determine if object is valid set for SELECT, INSERT and UPDATE operations
    private $isValid;
    // determine if object is valid set for CREATE TABLE operations
    private $isFullValid;


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Accessors
    
    #region DataType
    public function setDataTypeFromString( string $dataType ) 
    {
        $this->insideSetDataTypeFromString( $dataType, TRUE );
    }


    private function insideSetDataTypeFromString( string $dataType, bool $validate ) : bool
    {
        $this->validateDataType( $dataType );
        if( $this->isValid )
            $this->dataType = $dataType;
        if( $validate )    
            $this->fullValidation();
        return $this->isValid;
    }


    public function getDataTypeString() : string
    {
        if( $this->isValid )
            return $this->dataType;
        else
            return "";
    }
    #endregion

    #region ParamOne
    public function setParamOne( int $paramOne )
    {
        $this->insideSetParamOne( $paramOne, TRUE );
    }


    private function insideSetParamOne( int $paramOne, bool $validate )
    {
        $this->paramOne = $paramOne;
        if( $validate )
            $this->validateParams();
    }


    public function getParamOne()
    {
        return $this->paramOne;
    }
    #endregion

    #region ParamTwo
    public function setParamTwo( int $paramTwo )
    {
        $this->insideSetParamTwo( $paramTwo, TRUE );
    }


    private function insideSetParamTwo( int $paramTwo, bool $validate )
    {
        $this->paramTwo = $paramTwo;
        if( $validate )
            $this->validateParams();
    }


    public function getParamTwo()
    {
        return $this->paramTwo;
    }
    #endregion


    public function isValid() : bool
    {
        return $this->isValid;
    }


    public function isFullValid() : bool
    {
        return $this->isFullValid;
    }


    public function getNumberOfParams()
    {
        return $this->numberOfParams;
    }


    #endregion    
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Public Methods

    public function setAllParams( string $dataType, int $paramOne = -1, int $paramTwo = -1 ) : bool
    {
        $this->insideSetDataTypeFromString( $dataType, FALSE );

        // Set both params without validation
        $this->insideSetParamOne( $paramOne, FALSE );
        $this->insideSetParamTwo( $paramTwo, FALSE );
        // Validate params
        return $this->fullValidation();
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Private Methods



    private function validateDataType( string $dataType ) : bool
    {
        // TODO set validate here
        $this->requiredNumberOfParams = 0;
        $this->isValid = TRUE;
        return $this->isValid;
    }


    private function validateParams( int $paramOne, int $paramTwo ) : bool
    {
        $numberOfParams = 0;
        $this->isFullValid = FALSE;
        if( $paramOne >= 0 && $paramTwo >= 0 )
            $numberOfParams = 2;
        elseif( $paramOne >= 0 )
            $numberOfParams = 1;
        else
            $numberOfParams = 0;

        if( $numberOfParams >= $this->requiredNumberOfParams )
        {    
            $this->isFullValid = TRUE;
            $this->numberOfParams = $numberOfParams;
        }
        return $this->isFullValid;
    }
    

    private function validateSetParams() : bool
    {
        return $this->validateParams( $this->paramOne, $this->paramTwo );
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Constructors

    public function __construct( string $dataType, int $paramOne = -1, int $paramTwo = -1 )
    {
        $this->isValid = FALSE;
        $this->setAllParams( $dataType, $paramOne, $paramTwo );
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region IValidatable implemetation

    // isValid() implemented in Accesors section
    // isFullValid implemented in Accesors section

    public function fullValidation() : bool
    {
        $this->validateDataType( $this->dataType );
        $this->validateSetParams();
        return $this->isFullValid;
    }

    public function validationReport( 
        bool $showOnlyInvalid = FALSE, 
        bool $showOnlyFullInvalid = FALSE 
        ) : string
    {
        $result = "["; 
        $result .= " class = " . get_class( $this );
        $result .= ", dataType = " . $this->getDataTypeString() ; 
        $result .= ", isValid = " . $this->isValid();
        $result .= ", isFullValid = " . $this->isFullValid();
        $result .= " ]";

        return $result;
    }

    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Magic Methods

    public function __toString()
    {
        $result = "[ dataType = $this->dataType, ";
        $result .= "paramOne = $this->paramOne, ";
        $result .= "paramTwo = $this->paramTwo, ";
        $result .= "numberOfParams = $this->numberOfParams ";
        $result .= "isValid = $this->isValid, ";
        $result .= "isFullValid = $this->isFullValid ]";

        return $result;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------
}