<?php

namespace Marmelade\Mailer;

use Marmelade\Interfaces\MailerInterface;
use Marmelade\Interfaces\SendMailInterface;
use Marmelade\Mailer\SendMail;

class SimpleMailer implements MailerInterface
{
    protected $emailAddresses = [];
    protected $sendMail;

    public function __construct(SendMailInterface $sendMail = null)
    {
        $this->sendMail = $sendMail ?? new SendMail();
    }

    public function addRecipient(string $emailAddress)
    {
        $this->emailAddresses[] = $emailAddress;
    }

    public function send(string $subject, string $body)
    {
        return $this->sendMail->mail(implode(',', $this->emailAddresses), $subject, $body);
    }
}
