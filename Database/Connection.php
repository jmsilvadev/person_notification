<?php

namespace Marmelade\Database;

use PDO;
use Marmelade\Database\Singleton;

/**
 * @codeCoverageIgnore
 */
class Connection extends Singleton
{
    public function getConn(string $dbName)
    {
        $dsn = "mysql:host=127.0.0.1;dbname=$dbName;charset=utf8mb4";
        return new PDO($dsn, 'user', 'pass');
    }
}
