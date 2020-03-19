<?php
declare(strict_types = 1);

namespace Marmelade\Mailer;

class LiskovMailer extends SurveyMailer
{
    public function sendSurvey(int $surveyId): bool
    {
        $survey = $this->surveyRepository->loadSurvey($surveyId);
        $message = 'LSP - Please respond to this survey: http://www.example.com/survey?hash=' . $survey->hash;
        return $this->send($this->addLiskovSubject(), $message);
    }

    protected function addLiskovSubject(): string
    {
        return 'LSP - Liskov Substite Principle: ';
    }
}