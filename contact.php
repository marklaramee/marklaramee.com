<?php 
  require '/var/www/settings/marklaramee-settings.php';
  $publickey = CAPTCHA_PUBKEY;
  $privatekey = CAPTCHA_PRIVATEKEY; 
  $activeNav = "contact";
  $title = "Contact";
  
  include 'includes/pageTop.php'; 
  include 'class/mailer.php'; 
?>

<h1>CONTACT</H1>

<?php
  if(empty($_POST['email_message'])) {
    //they haven't sent yet, display the email form
    include 'includes/contactForm.php'; 
  } else {
    
    //create the email
    $objMailer = mailer::createWithKey($privatekey);
    $objMailer->set_senderName($_POST['email_name']);
    $objMailer->set_senderEmail($_POST['email_address']);
    $objMailer->set_subject($_POST['email_subject']);
    $objMailer->set_message($_POST['email_message']);
    
    //send and handle errors
    if($objMailer->validateRecaptcha($_POST["g-recaptcha-response"])) {
      if($objMailer->sendMail()) {
        ?>
        <div class="alert alert-primary alert--bigtopspace" role="alert">
          Your email has been sent, Thank you.
        </div>
      <?php
      } else {
        ?>
        <div class="alert alert-danger alert--bigtopspace" role="alert">
          There was a problem sending your email. Please contact me directly at <a href="mailto:marklaramee@gmail.com">marklaramee@gmail.com</a>
        </div>
        <?php
      }
    } else {
    ?>
    <div class="alert alert-danger" role="alert">
      Please complete the reCaptcha
    </div>
    <?php
      include 'includes/contactForm.php'; 
    }

  }
?>

<?php 
  
  include 'includes/pageBottom.php'; 
?>