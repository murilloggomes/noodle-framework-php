<?php 
/**
 * Email class to send advanced HTML emails
 * 
 * @author Onelab <hello@onelab.co>
 */


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email extends PHPMailer{
    /**
     * Email template html
     * @var string
     */
    public static $template;


    /**
     * Email and notification settings from database
     * @var DataEntry
     */
    public static $emailSettings;


    /**
     * Site settings
     * @var DataEntry
     */
    public static $siteSettings;


    public function __construct(){  
        parent::__construct();

        // Get settings
        $emailSettings = self::getEmailSettings();
        
        // Get site name
        $siteSettings = self::getSiteSettings();

        $this->CharSet = "UTF-8";
        $this->isHTML();

        if ($emailSettings->get("data.smtp.host")) {
            $this->isSMTP();

            if ($emailSettings->get("data.smtp.from")) {
                $this->From = $emailSettings->get("data.smtp.from");
                $this->FromName = htmlchars($siteSettings->get("data.site_name"));
            }
            
            $this->Host = $emailSettings->get("data.smtp.host");
            $this->Port = $emailSettings->get("data.smtp.port");
            $this->SMTPSecure = $emailSettings->get("data.smtp.encryption");

            if ($emailSettings->get("data.smtp.auth")) {
                $this->SMTPAuth = true;
                $this->Username = $emailSettings->get("data.smtp.username");

                try {
                    $password = \Defuse\Crypto\Crypto::decrypt($emailSettings->get("data.smtp.password"), 
                                \Defuse\Crypto\Key::loadFromAsciiSafeString(CRYPTO_KEY));
                } catch (Exception $e) {
                    $password = $emailSettings->get("data.smtp.password");
                }
                $this->Password = $password;
            }


            // If your mail server is on GoDaddy
            // Probably you should uncomment following 7 lines

            // $this->SMTPOptions = array(
            //     'ssl' => array(
            //         'verify_peer' => false,
            //         'verify_peer_name' => false,
            //         'allow_self_signed' => true
            //     )
            // );
        }
    }


    /**
     * Send email with $content
     * @param  string $content Email content
     * @return boolen          Sending result
     */
    public function sendmail($content){
        $html = self::getTemplate();
        $html = str_replace("{{email_content}}", $content, $html);

        $this->Body = $html;

        return $this->send();
    }


    /**
     * Get email settings
     * @return string|null 
     */
    private static function getEmailSettings()
    {
        if (is_null(self::$emailSettings)) {
            self::$emailSettings = \Controller::model("GeneralData", "email-settings");
        }

        return self::$emailSettings;
    }

    /**
     * Get site settings
     * @return string|null
     */
    private static function getSiteSettings()
    {
        if (is_null(self::$siteSettings)) {
            self::$siteSettings = \Controller::model("GeneralData", "settings");
        }

        return self::$siteSettings;
    }


    /**
     * Get template HTML
     * @return string 
     */
    private static function getTemplate()
    {   
        if (!self::$template) {
            $html = file_get_contents(APPPATH."/inc/email-template.inc.php");
            $Settings = self::getSiteSettings();
            
            $html = str_replace(
                [
                    "{{site_name}}",
                    "{{foot_note}}",
                    "{{appurl}}",
                    "{{copyright}}"
                ], 
                [
                    htmlchars($Settings->get("data.site_name")),
                    __("Thanks for using %s.", htmlchars($Settings->get("data.site_name"))),
                    APPURL,
                    __("All rights reserved.")
                ], 
                $html
            );
            
            self::$template = $html;
        }

        return self::$template;
    }




    /**
     * Send notifications
     * @param  string $type notification type
     * @return [type]       
     */
    public static function sendNotification($type = "new-user", $data = [])
    {
        switch ($type) {
            case "new-user":
                return self::sendNewUserNotification($data);
                break;

            case "new-payment":
                return self::sendNewPaymentNotification($data);
                break;           
            default:
                break;
        }
    }

  
  
}