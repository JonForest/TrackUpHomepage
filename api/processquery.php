<?php
/**
 * Created by PhpStorm.
 * User: jonforest
 * Date: 05/04/2014
 * Time: 15:27
 */

require_once('phpmailer/class.phpmailer.php');

class Emailer
{
    /**
     * @param string $name
     * @param string $email
     * @param string $query
     *
     * @return string
     */
    public function sendEmail($name, $email, $query)
    {
        $message = '<p><b>From:</b> ' . $name . '</b></p>';
        $message .= '<p><b>Email:</b> ' . $email . '</p>';
        $message .= '<p>' . $query . '</p>';

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host       = 'mail.able-futures.com';      // SMTP server example, use smtp.live.com for Hotmail
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Port       = 587;                   // SMTP port for the GMAIL server 465 or 587
        $mail->Username   = 'improve@able-futures.com';  // SMTP account username example
        $mail->Password   = 'xxxxxx';
        $mail->SetFrom('improve@able-futures.com', 'Website Enquiry'); //set from name
        $mail->AddAddress('jonforest@gmail.com');
        $mail->Subject = "Enquiry from " . $name;
        $mail->MsgHTML($message);

        if ($mail->Send()) {
            return "Location: ../content.php?r=emailsuccess";
        } else {
            return "Location: ../content.php?r=index";
        }
    }
}

