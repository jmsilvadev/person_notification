<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Mailer\SurveyMailer;
use Marmelade\Mailer\SurveyRepository;

class SurveyMailerTest extends TestCase
{
    public function testSendSurvey()
    { 
        $survey = new SurveyMailer(new SurveyRepository());
        $survey->addRecipient('email@fake.com');
        $result = $survey->sendSurvey(1);
        $this->assertIsBool($result);
    }
}