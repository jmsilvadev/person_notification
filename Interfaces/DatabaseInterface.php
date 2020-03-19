<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface DatabaseInterface
{
    public function getEmailAddress(int $personId, string $department): string;
}
