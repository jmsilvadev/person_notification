<?php

namespace Marmelade\Mailer;

use Marmelade\Interfaces\SurveyMailerInterface;
use Marmelade\Interfaces\SurveyRepositoryInterface;
use Marmelade\Mailer\SurveyRepository;

class SurveyMailer extends SimpleMailer implements SurveyMailerInterface
{
    private $surveyRepository;

    //Definition of SurveyRepository not shown, but assume it is fine.
    // According Repository Pattern this DI must be an Interface
    // According with DIP (SOLID): one should "Depend upon Abstractions" Do not depend upon concretions
    public function __construct(SurveyRepositoryInterface $surveyRepository = null)
    {
        parent::__construct();
        $this->surveyRepository = $surveyRepository ?? new SurveyRepository();
    }

    //Violates SRP, what this method sould be to do? Send Survey or return a Survey?
    public function sendSurvey(int $surveyId)
    {
        $survey = $this->surveyRepository->loadSurvey($surveyId);
        $message = 'Please respond to this survey: http://www.example.com/survey?hash=' . $survey->hash;
        return $this->send('Survey', $message);
    }
}
