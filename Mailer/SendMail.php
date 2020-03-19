<?php

namespace Marmelade\Mailer;

use Marmelade\Interfaces\SendMailInterface;

class SendMail implements SendMailInterface
{
    public function mail(string $to, string $subject, string $body): bool
    {
        return mail($to, $subject, $body);
    }
}