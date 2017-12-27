<?php
declare(strict_types=1);

namespace PhpMysqlLib;

/**
 * Interface determines on class ability of validation for potential MySQL error in names etc.
 */
interface IValidatable
{
    /**
     * Check if basic data for class is valid.
     */
    public function isValid() : bool;
    /**
     * Check if data in class and all internal objects is valid for all supported MySQL operations.
     */
    public function isFullValid() : bool;
    /**
     * Validate all fields
     */
    public function fullValidation() : bool;
    /**
     * return report of class validation including reports of internal objects(hierarchicaly).
     */
    public function validationReport();
}