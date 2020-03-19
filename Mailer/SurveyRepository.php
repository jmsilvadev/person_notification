<?php

namespace Marmelade\Mailer;

use Marmelade\Interfaces\SurveyRepositoryInterface;

class SurveyRepository implements SurveyRepositoryInterface
{
    public function loadSurvey(int $surveyId): object
    {
        return (object) [
            'hash' => 'survey-1',
        ];
    }
}
