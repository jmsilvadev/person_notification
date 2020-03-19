<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface NotificationServiceInterface
{
    public function notify(int $personId, string $department, string $message): bool;
}
