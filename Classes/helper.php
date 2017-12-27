<?php
declare(strict_types=1);

namespace PhpMysqlLib;

class Helper
{
    /**
     * Validate given names in general for MySQL names.
     * Quoted identifiers are NOT supported.
     * @param string $name Name to validate
     * @return bool TRUE for valid, FALSE in other case
     */
    public static function validateName( string $name ) : bool
    {
        $pattern = '/[^a-zA-Z0-9_$]/';
        $hits = preg_match( $pattern, $name );
        if( $hits > 0)
            return FALSE;
        else
            return TRUE;    
    }

    /**
     * Validate if given name is correct for MySQL table name.
     * @param string $name Name to validate
     * @return bool TRUE for valid, FALSE in other case
     */
    public static function validateTableName( string $name ) : bool
    {
        return self::validateName( $name );
    }

    /**
     * Validate if given name is correct for MySQL table column name.
     * @param string $name Name to validate
     * @return bool TRUE for valid, FALSE in other case
     */
    public static function validateColumnName( string $name ) : bool
    {
        return self::validateName( $name );
    }
}