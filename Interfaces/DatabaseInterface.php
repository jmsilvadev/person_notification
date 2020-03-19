<?php

namespace Marmelade\Interfaces;

interface DatabaseInterface
{
    public function getEmailAddress($personId, string $department);
}
