<?php
namespace PhpMysqlLib;

class DataType
{
    //------------------------------------------------------------------------------------------------------------------
    #region Private fields

    private $dataType;
    private $isValid;
    private $paramOne;
    private $paramTwo;


    #endregion
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Accessors
    
    public function setDataTypeFromString( string $dataType, int $paramOne = -1, int $paramTwo = -1 )
    {
        // TODO
        // Add validation here
        $this->isValid = TRUE;
        $this->dataType = $dataType;
        $this->paramOne = $paramOne;
        $this->paramTwo = $paramTwo;
    }


    public function getDataTypeString() : string
    {
        if( $this->isValid )
            return $this->dataType;
        else
            return "";
    }


    public function getParamOne()
    {
        return $this->paramOne;
    }


    public function getParamTwo()
    {
        return $this->paramTwo;
    }


    public function isValid() : boolean
    {
        return $this->isValid;
    }


    #endregion    
    //------------------------------------------------------------------------------------------------------------------


    //------------------------------------------------------------------------------------------------------------------
    #region Constructors

    public function __construct( string $dataType, int $paramOne = -1, int $paramTwo = -1 )
    {
        $this->isValid = FALSE;
        $this->setDataTypeFromString( $dataType, $paramOne, $paramTwo );
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
        $result .= "isValid = $this->isValid ]";

        return $result;
    }


    #endregion
    //------------------------------------------------------------------------------------------------------------------
}