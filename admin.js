$('.js-saveList').on('click', function () {
  let selectedcolor = $(this).closest('td').find('.select').find('.option:selected').text();
  let row = $(this).closest('tr');
  let id = row.find('.user_id').text();
  let col = $(this).closest('tr');

  $.ajax('addTask', {
    type: 'POST',
    data: {
      'id': id,
      ' option': selectedcolor.trim(),
    },
    dataType: 'json',
  })
  })
$('.js-saveTask').on('click', function () {
  let task =$('.newTask').val()
  $.ajax('addTaskList', {
    type: 'POST',
    data: {
      ' task': task,
    },
    dataType: 'json',
  }).done(function (response){
    if(response){
      let message = $('.messageAdmin');
      var responseMessage = 'Task successfully add to base';
      message.text(responseMessage);
      $('.newTask').val('');
    }
    else{
      responseMessage = 'This task already in base';
      message.text(responseMessage);
    }

  })
})
$('.js-logOut').on('click', function () {
  $.ajax('logout', {
    type: 'POST',
    dataType: 'json',
  }).done(function (response){
    if(response) {
      window.location.href = '/';
    }
  })
})