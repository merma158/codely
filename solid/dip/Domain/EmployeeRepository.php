<?php

namespace App\Domain;

use DateTimeInterface;

interface EmployeeRepository
{
    /**
     * @return array<Employee>
     */
    public function findEmployeesBornOn(DateTimeInterface $date): array;
}