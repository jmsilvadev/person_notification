<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface SurveyRepositoryInterface
{
    public function loadSurvey(int $surveyId): object;
}
