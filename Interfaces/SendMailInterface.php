<?php

namespace Marmelade\Interfaces;

interface SendMailInterface
{
    public function mail(string $to, string $subject, string $body): bool;
}