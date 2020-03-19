<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Database\MyDatabaseClass;
use Mockery;

class DatabaseTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = Mockery::mock('PDO');
        $stmt = Mockery::mock('PDOStatemement');
        
        $stmt->shouldReceive('fetchColumn')
            ->once()
            ->andReturn('email@fake.com');

        $stmt->shouldReceive('bindValue')
            ->once()
            ->andReturn(true);
        $stmt->shouldReceive('execute')
            ->once()
            ->andReturn(true);
        
        $this->pdo->shouldReceive('prepare')->once()
            ->withArgs(['SELECT email FROM person WHERE id = :id'])
            ->andReturn($stmt);
    }
    
    public function testGetEmailAddress()
    {   
        $conn = Mockery::mock('\Marmelade\Database\Connection');
        $conn->shouldReceive('getConn')->once()->andReturn($this->pdo);

        $db = new MyDatabaseClass($conn);
        $email = $db->getEmailAddress(1, 'Accounts');
        $this->assertEquals($email, 'email@fake.com');

        $email = $db->getEmailAddress(1, 'Non-Existent');
        $this->assertEquals($email, 'email@fake.com');
    }

    
}