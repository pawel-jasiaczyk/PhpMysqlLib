<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once( "Classes/includes.inc" );
use PhpMysqlLib as a;

$myType = new a\DataType( "int" );
$myColumn = new a\Column( $myType, "Test_column" );

echo (string)$myType;
echo (string)$myColumn;