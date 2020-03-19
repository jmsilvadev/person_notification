<?php
declare(strict_types = 1);

namespace Marmelade\Mailer;

use Marmelade\Interfaces\MailerInterface;
use Marmelade\Interfaces\SendMailInterface;
use Marmelade\Mailer\SendMail;
use Exception;

class SimpleMailer implements MailerInterface
{
    protected $emailAddresses = [];
    protected $sendMail;

    public function __construct(SendMailInterface $sendMail = null)
    {
        $this->sendMail = $sendMail ?? new SendMail();
    }

    public function addRecipient(string $emailAddress): void
    {
        $this->validateEmail($emailAddress);
        $this->emailAddresses[] = $this->sanitizeEmail($emailAddress);
    }

    public function send(string $subject, string $body): bool
    {
        if (!$this->emailAddresses) {
            return false;
        }
        $bodyEscaped = htmlspecialchars($body, ENT_QUOTES, 'UTF-8');
        return $this->sendMail->mail(implode(',', $this->emailAddresses), $subject, $bodyEscaped);
    }

    private function validateEmail(string $emailAddress): void
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid Email');
        }
    }

    private function sanitizeEmail(string $emailAddress): string
    {
        return filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
    }
}
