<?php
declare(strict_types = 1);

namespace Marmelade\Services;

use Marmelade\Interfaces\NotificationServiceInterface;
use Marmelade\Interfaces\SurveyMailerInterface;
use Marmelade\Interfaces\DatabaseInterface;

class PersonNotificationService implements NotificationServiceInterface
{
    public const NOTIFICATION_SURVEY_ID = 1;

    /** @var MailerInterface **/
    private $mailer;

    /** @var DatabaseInterface **/
    private $db;

    public function __construct(SurveyMailerInterface $mailer, DatabaseInterface $database = null)
    {
        $this->db = $database ?? new MyDatabaseClass();
        $this->mailer = $mailer;
    }

    public function notify(int $personId, string $department, string $message): bool
    {
        $emailAddress = $this->db->getEmailAddress($personId, $department);
        $this->mailer->addRecipient($emailAddress);
        $sent = $this->mailer->sendSurvey(self::NOTIFICATION_SURVEY_ID);
        if ($sent) {
            return $this->mailer->send('Automatic Notification', $message);
        }
        
        return false;
        
    }
}
