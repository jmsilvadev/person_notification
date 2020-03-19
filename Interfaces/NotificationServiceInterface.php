<?php

namespace Marmelade\Interfaces;

interface NotificationServiceInterface
{
    public function notify(string $personId, string $department, string $message);
}
