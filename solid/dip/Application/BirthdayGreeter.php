<?php

use App\Domain\Email;
use App\Domain\Employee;
use App\Domain\EmailSender;
use App\Domain\EmployeeRepository;
use DateTimeInterface;

class BirthdayGreeter {

    /** @var EmployeeRepository */
    private $employeeRepository;

    /** @var EmailSender */
    private $emailSender;

    /** @var DateTimeInterface*/
    private $clock;

    function __construct(EmployeeRepository $employeeRepository, EmailSender $emailSender, DateTimeInterface $clock)
    {
        $this->employeeRepository = $employeeRepository;
        $this->emailSender = $emailSender;
        $this->clock = $clock;
    }

    public function sendGreetings(): void 
    {
        /** @var array<Employee> */
        $employees = $this->employeeRepository->findEmployeesBornOn($this->clock);

        /** @var array<Email> */
        $emails = array_map(function(Employee $employee) {
            return new Email($employee->email(), 'Good day ' . $employee->firstname(), 'Have a nice day');
        }, $employees);

        /** @var Email */
        foreach ($emails as $email) {
            $this->emailSender->send($email);
        }
    }

}