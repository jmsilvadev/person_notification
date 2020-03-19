<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Mailer\SurveyRepository;

class SurveyRepositoryTest extends TestCase
{
    public function testLoadSurvey()
    { 
        $survey = new SurveyRepository();
        $result = $survey->loadSurvey(1);
        $this->assertEquals($result->hash, 'survey-1');
    }
}