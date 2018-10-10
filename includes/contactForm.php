<p>
  Please use this form to email me with any questions, requests or comments. 
</p>
<form id="contactForm" method="post">
  <div class="container-fluid container-fluid--contact">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="fading-label">
          <input type="text" name="email_name" id="email_name" placeholder="Your Name" class="js-fbfValidation"/>
          <label for="email_name" >Your Name</label>
        </div>
        <div id="email_name_error" class="error_message"></div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="fading-label">
          <input type="text" name="email_address" id="email_address" placeholder="Your Email" class="js-fbfValidation" />
          <label for="email_address" >Your Email</label>
        </div>
        <div id="email_address_error" class="error_message"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="fading-label">
          <input type="text" name="email_subject" id="email_subject" placeholder="Subject (optional)" class="js-fbfValidation" />
          <label for="email_name" >Subject</label>
        </div>
        <div id="email_subject_error" class="error_message"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="fading-label">
          <textarea name="email_message" id="email_message" placeholder="Message" class="js-fbfValidation" ></textarea>
          <label for="email_message" >Message</label>
        </div>
        <div id="email_message_error" class="error_message error--textarea "></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="g-recaptcha" data-sitekey="<?php echo $publickey ?>"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <input type="submit" class="mButton" value="SEND" />
      </div>
    </div>
  </div>
</form>