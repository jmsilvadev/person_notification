<?php

namespace Marmelade\Database;

use Marmelade\Interfaces\DatabaseInterface;

class MyDatabaseClass implements DatabaseInterface
{

    private $conn;

    public function __construct(Connection $conn = null)
    {
        $this->conn = $conn ?? Connection::instance();
    }

    public function getEmailAddress($personId, string $department)
    {
        $dbName = $this->getDbName($department);
        $db = $this->conn->getConn($dbName);
        $stm = $db->prepare('SELECT email FROM person WHERE id = :id');
        $stm->bindValue(':id', $personId);
        $stm->execute();

        return $stm->fetchColumn(0);
    }

    private function getDbName(string $department): string
    {
        $departments = [
            'Accounts' => 'finance',
            'Complaints' => 'operations',
        ];

        if (array_key_exists($department, $departments)) {
            return $departments[$department];
        }

        return 'warehouse';
    }
}
