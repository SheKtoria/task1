$(function () {
  $('.login-button').on('click', function () {
    let message = $('.message')
    //debugger;
    $.ajax('/login', {
      type: 'POST',
      dataType: 'json',
      data: {
        'usernameLogin': $('.usernameLogin').val(),
        'passwordLogin': $('.passwordLogin').val(),
      },
    }).done(function (response) {
      var responseMessage = 'User successfully registered';
      if (response === 1) {
        message.text(responseMessage);
        $('#formLogin').trigger('reset')
        setTimeout(function () {
          window.location.href = '/users'
        }, 700);
      } else if (response === 2) {
        message.text(responseMessage);
        $('#formLogin').trigger('reset')
        setTimeout(function () {
          window.location.href = '/admin'
        }, 700);
      }else if (response === 3) {
        responseMessage = 'No such user found';
        message.text(responseMessage);
      } else if (response === 4) {
        responseMessage = 'All fields should be required!';
        message.text(responseMessage);
      }
    })
  })
})