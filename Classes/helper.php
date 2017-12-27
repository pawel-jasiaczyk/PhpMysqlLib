<?php
declare(strict_types=1);

namespace PhpMysqlLib;

class Helper
{
    public static function validateName( string $name ) : bool
    {
        $pattern = '/[^a-zA-Z0-9_$]/';
        $hits = preg_match( $pattern, $name );
        if( $hits > 0)
            return FALSE;
        else
            return TRUE;    
    }


    public static function validateTableName( string $name ) : bool
    {
        return self::validateName( $name );
    }


    public static function validateColumnName( string $name ) : bool
    {
        return self::validateName( $name );
    }
}