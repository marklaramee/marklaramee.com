var MarkLaramee = MarkLaramee || {};
MarkLaramee.Common = function () {
  
  var emailRegex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

  var init = function() {
    disableBootstrapNavClicks();
    initContactForm();
  }  

  var isValidEmail = function (email) {
      if(typeof email == "string") {
          email = email.toLowerCase();
      }
      return emailRegex.test(email);
  };

  var disableBootstrapNavClicks = function() {
    $('a#navbarDropdown.nav-link dropdown-toggle').off('click');
    $('a#navbarDropdown.nav-link dropdown-toggle').off('keydown');
  }

  var initContactForm = function() {
    $("#contactForm").on('submit', function() {
      //initialize field ids here so we can do field by field validation after submit failure
      var nameId = 'email_name';
      var addressId = 'email_address';
      var messageId = 'email_message';
      var allFields = Array(nameId, addressId, messageId);
      //remove any existing errors
      allFields.forEach(function(fieldId) {
        removeFieldError(fieldId);
      });
      return validateContactForm(nameId, addressId , messageId);
    });
  }

  var removeFieldError = function(fieldId) {
    $('#' + fieldId).removeClass('error_field');
    $('#' + fieldId + '_error').html('');
  }

  var validateContactForm = function(nameId, addressId, messageId) {
     var badFieldIds = Array();
     var valid = true;
    
    //check values
    if($('#' + nameId).val().length == 0) {
      badFieldIds.push(nameId);
      $('#' + nameId + '_error').html('Please enter your name');
    }
    if($('#' + addressId).val().length == 0) {
      badFieldIds.push(addressId);
      $('#' + addressId + '_error').html('Please enter your email address');
    } else {
      if(!isValidEmail($('#' + addressId).val())) {
        badFieldIds.push(addressId);
        $('#' + addressId + '_error').html('Please enter a valid email address');
      }
    }
    if($('#' + messageId).val().length == 0) {
      badFieldIds.push(messageId);
      $('#' + messageId + '_error').html('Please enter your message');
    }

    //set error fields
    badFieldIds.forEach(function(fId) {
      valid = false;
      $('#' + fId).addClass('error_field');
    });

    //set up field by field validation
    $('.js-fbfValidation').on('focus', function() {
      removeFieldError($(this).prop('id'));
    });
    $('.js-fbfValidation').on('blur', function() {
      validateContactForm(nameId, addressId , messageId);
    });

    return valid;
  }

  return { 
    init: init
  };
}();

$(document).ready(function () {
	MarkLaramee.Common.init();
});