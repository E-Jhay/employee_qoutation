<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private $mailer;

    public function __construct($config)
    {
        $this->mailer = new PHPMailer(true);
        $this->configureMailer($config);
    }

    private function configureMailer($config)
    {
        // Enable verbose debugging output
        // $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;

        // Set mailer to use SMTP
        $this->mailer->isSMTP();

        // Specify SMTP host
        $this->mailer->Host = $config['host'];

        // Enable SMTP authentication
        $this->mailer->SMTPAuth = true;

        // SMTP username and password
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];

        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        // $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->SMTPSecure = 'ssl';

        // TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS`, 465 for `PHPMailer::ENCRYPTION_SMTPS`
        $this->mailer->Port = $config['port'];
        // $this->mailer->SMTPOptions = [
        //     'ssl' => [
        //         'verify_peer' => false,
        //         'verify_peer_name' => false,
        //         'allow_self_signed' => true,
        //     ],
        // ];
        //Recipients
        $this->mailer->setFrom($config['from'], $config['fromName']);
    }

    public function sendMail($to, $subject, $body, $cc = [])
    {
        try {
            //Recipients
            // $this->mailer->setFrom($from, $fromName);

            // Add multiple recipients
            if (is_array($to)) {
                foreach ($to as $recipient) {
                    $this->mailer->addAddress($recipient);
                }
            } else {
                $this->mailer->addAddress($to);
            }

            // Add CC recipients
            if (!empty($cc)) {
                if (is_array($cc)) {
                    foreach ($cc as $ccRecipient) {
                        $this->mailer->addCC($ccRecipient);
                    }
                } else {
                    $this->mailer->addCC($cc);
                }
            }

            // Content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
                // echo 'Message could not be sent. Mailer Error: ', $this->mailer->ErrorInfo;
            throw new Exception("Message could not be sent. Mailer Error", 1);
            
            // $response = array('success' => true, 'message' => $e->getMessage());
        }
    }
}