<?php
declare(strict_types = 1);

namespace Marmelade\Repositories;

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
