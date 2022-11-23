<?php

namespace App\Infrastructure;

use App\Domain\Employee;
use App\Domain\EmployeeRepository;
use DateTimeInterface;

class RamEmployeeRepository implements EmployeeRepository
{
    /** @var array<Employee> */
    private $employees;

    /**
     * @param array<Employee> $employees
     */
    public function __construct(array $employees)
    {
        $this->employees = $employees;
    }

    /**
     * @param DateTimeInterface $date
     * @return array<Employee>
     */
    public function findEmployeesBornOn(DateTimeInterface $date): array
    {
        return array_filter($this->employees, function (Employee $employee) use ($date) {
            return 0 === $employee->birthday()->diff($date)->d;
        });
    }
}