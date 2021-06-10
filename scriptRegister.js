$(function () {
  $('.register-button').on('click', function () {
    let message = $('.message')
    $.ajax('register', {
      type: 'post',
      dataType: 'json',
      data: {
        'name': $('.name').val(),
        'login': $('.username').val(),
        'email': $('.email').val(),
        'password': $('.password').val(),
        'confirmPassword': $('.confirm-password').val(),
      },
    }).done(function (response) {
      var responseMessage = 'User successfully registered';
      if (response === 1) {
        message.text(responseMessage);
        $('#form').trigger('reset')
      } else if (response === 2) {
        responseMessage = 'Password mismatch';
        message.text(responseMessage);
        $('.confirm-password').val('');
      } else if (response === 3) {
        responseMessage = 'This user is already registered';
        message.text(responseMessage);
      } else if (response === 4){
        responseMessage = 'All fields should be required!';
      message.text(responseMessage);
    }
    })
  })
  // $('.loginButton').on('click', function () {
  //   window.location.href = 'login.php'
  // })
})

