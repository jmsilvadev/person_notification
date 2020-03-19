<?php
namespace Marmelade;

use PHPUnit\Framework\TestCase;
use Marmelade\Services\PersonNotificationService;
use Marmelade\Mailer\LiskovMailer;
use Marmelade\Database\MyDatabaseClass;
use Mockery;

class LiskovTest extends TestCase
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

    public function testNotifyUsingLiskovSubstitutePrinciple()
    { 
        $conn = Mockery::mock('\Marmelade\Database\Connection');
        $conn->shouldReceive('getConn')->once()->andReturn($this->pdo);

        $survey = new PersonNotificationService(new LiskovMailer(), new MyDatabaseClass($conn));
        $result = $survey->notify(1, 'Accounts', 'Teste');
        $this->assertIsBool($result);
    }
}