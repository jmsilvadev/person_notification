<?php

namespace Marmelade\Interfaces;

interface SurveyRepositoryInterface
{
    public function loadSurvey(int $surveyId): object;
}
