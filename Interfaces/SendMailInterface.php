<?php
declare(strict_types = 1);

namespace Marmelade\Interfaces;

interface SendMailInterface
{
    public function mail(string $to, string $subject, string $body): bool;
}