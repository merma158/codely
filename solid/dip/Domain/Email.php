<?php

namespace App\Domain;

class Email
{
    /** @var string */
    private $to;
    /** @var string */
    private $subject;
    /** @var string */
    private $message;

    public function __construct(string $to, string $subject, string $message)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function to(): string
    {
        return $this->to;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function message(): string
    {
        return $this->message;
    }
}