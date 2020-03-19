<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Mailer\SimpleMailer;
use Mockery;
use Exception;

class SimpleMailerTest extends TestCase
{
    
    public function testSend()
    {   
        $sendMail = Mockery::mock('\Marmelade\Mailer\SendMail');
        $sendMail->shouldReceive('mail')->once()->andReturn(true);

        $mail = new SimpleMailer($sendMail);
        $mail->addRecipient('email@fake.com');
        $email = $mail->send('Subject', 'Accounts');
        $this->assertIsBool($email);
    }

    public function testSendWithoutEmail()
    {   
        $sendMail = Mockery::mock('\Marmelade\Mailer\SendMail');
        $sendMail->shouldReceive('mail')->once()->andReturn(true);
        $mail = new SimpleMailer($sendMail);
        $email = $mail->send('Subject', 'Accounts');
        $this->assertFalse($email);
    }

    public function testSendWithInvalidEmail()
    {   
        $sendMail = Mockery::mock('\Marmelade\Mailer\SendMail');
        $sendMail->shouldReceive('mail')->once()->andReturn(true);

        $mail = new SimpleMailer($sendMail);
        $this->expectException(Exception::class);
        $mail->addRecipient('email.fake.com');
    }
}