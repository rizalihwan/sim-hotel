$('body').on('click', '.modal-show-detail', function () {
    event.preventDefault();
    let me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
    $('#modal-title').text(title);
    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });
    $('#modal').modal('show');
});