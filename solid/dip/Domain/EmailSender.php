<?php

namespace App\Domain;

interface EmailSender
{
    /**
     * @param Email $email
     * @return void
     */
    public function send(Email $email): void;
}