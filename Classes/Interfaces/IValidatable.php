<?php
declare(strict_types=1);

namespace PhpMysqlLib;

interface IValidatable
{
    public function isValid() : bool;
    public function fullValidation() : bool;
    public function validationReport();
}