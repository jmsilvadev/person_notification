<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Mailer\SimpleMailer;
use Mockery;

class SimpleMailerTest extends TestCase
{
    
    public function testsend()
    {   
        $sendMail = Mockery::mock('\Marmelade\Mailer\SendMail');
        $sendMail->shouldReceive('mail')->once()->andReturn(true);

        $mail = new SimpleMailer($sendMail);
        $mail->addRecipient('email@fake.com');
        $email = $mail->send('Subject', 'Accounts');
        $this->assertIsBool($email);
    }
}