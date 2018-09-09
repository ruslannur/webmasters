$('#authButton').click(function() {
	$(this).attr('class', 'btn btn-default disabled');
        $(this).html($(this).attr('js-txt'));
        $('#authForm').submit();
});
       

$('#submitBut').click(function() {
       
    var first_name = $.trim($('#inputName').val());    
    var email = $.trim($('#inputEmail').val());
    var password = $.trim($('#inputPwd').val());
    var password_again = $.trim($('#inputPwdAgain').val());
    var description = $.trim($('#descriptionId').val());
    var error_status = 1;
    var err_msg = '';
    
    $("#errorMsg").hide();
   
    if (first_name.length < 1) {
      err_msg = $('#inputName').attr('js-txt')+'<br>';
      error_status = -1;      
    }

    if (email.length < 1) {
      err_msg += $('#inputEmail').attr('js-txt')+'<br>';
      error_status = -1;      
    }

    var reg_email = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (!reg_email.test(email)) {
      err_msg += $('#inputEmail').attr('js-txt-valid')+'<br>';
      error_status = -1;
    }

    if (password.length < 8) {
      err_msg += $('#inputPwd').attr('js-txt')+'<br>';
      error_status = -1;      
    }

    if (description.length < 1) {
      err_msg += $('#descriptionId').attr('js-txt')+'<br>';
      error_status = -1;      
    }

    if (password.length != password_again.length) {
      err_msg += $('#inputPwdAgain').attr('js-txt')+'<br>';
      error_status = -1;      
    }    

    if (error_status == -1) {
      $('#msg').html(err_msg);
      $('#errorMsg').show();
    } else {
        $(this).attr('class', 'btn btn-primary disabled');
        $(this).html($(this).attr('js-txt')+'...');
        $('#registration').submit();
    }
   
});



