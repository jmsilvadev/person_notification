<?php

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

    //Type String og personId with error, must be integer
    public function notify(string $personId, string $department, string $message)
    {
        $emailAddress = $this->db->getEmailAddress($personId, $department);
        $this->mailer->addRecipient($emailAddress);
        $this->mailer->sendSurvey(self::NOTIFICATION_SURVEY_ID);
        return $this->mailer->send('Automatic Notification', $message);
    }
}
