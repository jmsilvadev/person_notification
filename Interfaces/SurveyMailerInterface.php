<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface SurveyMailerInterface
{
    public function sendSurvey(int $surveyId): bool;
}
