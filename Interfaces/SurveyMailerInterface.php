<?php

namespace Marmelade\Interfaces;

interface SurveyMailerInterface
{
    public function sendSurvey(int $surveyId);
}
