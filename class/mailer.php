<?php
 /*
  SES instructions
  https://docs.aws.amazon.com/ses/latest/DeveloperGuide/send-using-smtp-php.html
*/
require '/var/www/settings/marklaramee-settings.php';
if(ENVIRONMENT == "prod") {
  require '/var/www/php/vendor/autoload.php';
}
use PHPMailer\PHPMailer\PHPMailer;

class mailer {
  //private
  var $recipient = "marklaramee@gmail.com";
  var $recipientName = "Mark Laramee";
  var $hostName = "MarkLaramee.com";
  var $smtpUser = SMTPUSER;
  var $smtpPass = SMTPPASS;

  //public
  var $senderName;
  var $senderEmail;
  var $subject;
  var $message;
  var $secretKey;
  var $debug = false;
  

  //constructors
  function __construct() {
    //allow empty contruction
  }
  public static function createWithKey($secret) {
      $instance = new self();
      $instance->set_secretKey($secret);
      return $instance;
  }

  //get/set
  function set_senderName($val) {
    $this->senderName = $val;
  }
  function get_senderName() {
    return $this->senderName;
  }

  function set_senderEmail($val) {
    $this->senderEmail = $val;
  }
  function get_senderEmail() {
    return $this->senderEmail;
  }

  function set_subject($val) {
    $this->subject = $val;
  }
  function get_subject() {
    return $this->subject;
  }

  function set_message($val) {
    $this->message = $val;
  }
  function get_message() {
    return $this->message;
  }

  function set_debug($val) {
    $this->debug = $val;
  }
  function get_debug() {
    return $this->debug;
  }

  function set_secretKey($val) {
    $this->secretKey = $val;
  }

  /** 
    takes a google captcha response code and validates it
    returns true or false 
  */
  function validateRecaptcha($response) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
      'secret' => $this->secretKey,
      'response' => $response
    );
    $options = array(
      'http' => array (
        'method' => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    return($captcha_success->success);
  }

  /** 
    sends an email to me and a copy to the sender

    returns a boolean that indicate whether the email was sent successfully
    $response = true/false

    if debug flag is set
    $response =  debug string
  */
  function sendMail() {
    if(empty($this->subject)) {
      $this->subject = "An email from marklaramee.com";
    }

    if(environment != "prod") {
      $response = true;
    } else {
      $mail = new \PHPMailer;

      //email content
      $mail->setFrom($this->recipient, $this->hostName);
      $mail->addAddress($this->recipient, $this->recipientName);
      //$mail->addAddress($this->senderEmail, $this->senderName);
      $mail->Subject = $this->subject;
      $mail->Body = "Email from " . $this->senderName . " " . $this->senderEmail  . "<br /><br />" .  $this->message;
      
      //functional info
      $mail->isSMTP();
      $mail->Username = $this->smtpUser;
      $mail->Password = $this->smtpPass;
      $mail->Host = 'email-smtp.us-west-2.amazonaws.com';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->isHTML(true);

      //send email
      if($this->debug) {
        $mail->Body = "This is a test email";
        $mail->SMTPDebug  = 1;
        if($mail->send()) {
          $response = "mail is working";
        } else {
          $response = "mail failed: " . $mail->ErrorInfo;
        }
      } else {
        $response = $mail->send();
      }
    } 
    return $response;
  }

  function sendDebug() {
    $this->subject = "debug email";
  }

}


?>