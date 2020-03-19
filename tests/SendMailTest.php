<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Mailer\SendMail;

class SendMailTest extends TestCase
{
    public function testMail()
    { 
        $mail = new SendMail();
        $sent = $mail->mail('email@fake.com', 'Subject', 'Message');
        $this->assertIsBool($sent);
    }
}