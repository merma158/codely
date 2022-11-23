<?php

namespace App\Infrastructure;

use App\Domain\Email;
use App\Domain\EmailSender;

class CliEmailSender implements EmailSender 
{
    /**
     * @param Email $email
     */
    public function send(Email $email): void
    {
        print sprintf("To: %s, Subject: %s, Message: %s", $email->to(), $email->subject(), $email->message());
    }
}