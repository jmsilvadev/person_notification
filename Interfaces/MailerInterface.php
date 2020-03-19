<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface MailerInterface
{
    public function addRecipient(string $emailAddress): void;
    public function send(string $subject, string $body): bool;
}
