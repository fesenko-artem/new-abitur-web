<?php

namespace Vendor\Helper;
use  Vendor\Core\Email\Exception;
use Vendor\Core\Email\Email;
class Mail
{
    public static function send_email($config,$to, $to_name, $subject, $body, $ccs = null, $bccs = null, $body_plain = null, $attachment = null, $attachment_name = null): bool
    {
        $mail = new Email(true);
        try {
            $mail->SMTPDebug = $config['SMTP_DEBUG'];
            $mail->isSMTP();
            $mail->Host = $config['MAIL_HOST'];
            $mail->Port = $config['MAIL_PORT'];
            $mail->setFrom($config['MAIL_FROM'], $config['MAIL_FROM_NAME']);
            $mail->addAddress($to, $to_name);
            if (isset($ccs) && is_array($ccs)) {
                foreach ($ccs as $cc) {
                    $mail->addCC($cc);
                }
            }
            if (isset($bccs) && is_array($bccs)) {
                foreach ($bccs as $bcc) {
                    $mail->addBCC($bcc);
                }
            }
            if (!empty($attachment)) {
                $mail->addAttachment($attachment, $attachment_name);
            }
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
            $mail->Body = $body;
            if (!empty($body_plain)) {
                $mail->AltBody = $body_plain;
            }

            $mail->send();
            return true;
        }
        catch (\Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
    }
    public static function prepare_template(string $template, array $params): string
    {
        $result = $template;
        foreach ($params as $key=>$value){
            $result = str_replace("{%$key%}",$value,$result);
        }
        return $result;
    }
}