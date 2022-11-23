<?php

namespace App\Domain;

use DateTimeInterface;

class Employee
{
    /** @var string */
    private $email;
    /** @var string */
    private $firstname;
    /** @var DateTimeInterface */
    private $birthday;

    public function __construct(string $email, string $firstname, DateTimeInterface $birthday)
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->birthday = $birthday;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function birthday(): DateTimeInterface
    {
        return $this->birthday;
    }
}