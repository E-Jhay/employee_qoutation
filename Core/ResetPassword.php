<?php

namespace Core;

class ResetPassword {

    public function attempt($email)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM user WHERE email = :email', [
            'email' => $email
        ])->find();

        if($user) {
            $this->sendResetPasswordLink($user);
            return true;
        }

        return false;
    }

    function sendResetPasswordLink($user) {
        $config = require base_path("config.php");
        $mailer = new Mailer($config['mail']);

        // $to = (array)$user['email'];
        $to = ['bumacodejhay@gmail.com'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/resetPasswordLink.html', [
            'email' => $user['email']
        ]);
        // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Quotation - Reset Password', $htmlContent);
    }
    
    // function logout()
    // {
    //     Session::destroy();
    // }
}