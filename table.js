$('.js-deleteRow').on('click', function () {
    let row = $(this).closest('tr'),
        id = row.find('.user_id').text();
    row.hide();
    $.ajax('delete', {
        type: 'POST',
        data: {
            'id': id
        },
        dataType: 'json',
    })
})
$('.js-editRow').on('click', function () {
    let row = $(this).closest('tr');
    let id = row.find('.user_id').text();
    let first_name = row.find('.user_first_name').text().trim();
    let username = row.find('.user_username').text().trim();
    let email = row.find('.user_email').text().trim();

    $.ajax('update', {
        type: 'POST',
        data: {
            ' id': id,
            ' first_name': first_name,
            ' username': username,
            ' email': email,
        },
        dataType: 'json',

    }).done(function (response) {
        let message = $('.user_message');
        if(!response) {
            let responseMessage = 'Can`t add this username';
            message.text(responseMessage);
        }
    })
})
