<?php

namespace PhpMysqlLib;

class Helper
{
    public static function validateName( string $name ) 
    {
        $pattern = '/[^a-zA-Z0-9_$]/';
        $hits = preg_match( $pattern, $name );
        if( $hits > 0)
            return FALSE;
        else
            return TRUE;    
    }
}