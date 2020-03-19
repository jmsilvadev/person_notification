<?php

namespace Marmelade\Interfaces;

interface MailerInterface
{
    public function addRecipient(string $emailAddress);
    public function send(string $subject, string $body);
}
