$(function () {



  $(".post-form").submit(function (e) {
    e.preventDefault();
    var error = false;
    $(this).find('input.req').each(function () {
      if (!$(this).val()) {
        error = true;
        $(this).addClass('error');
      }
      else {
        $(this).removeClass('error');
      }
    });
    var t = $(this).find('button').text();

    if (!error) {
      $(this).find('button').text('Отправка ...');
      sendData($(this), t);
      $(this)[0].reset();
    }
  });


});



function sendData(form, text) {

  var post_data = form.serializeArray();

  $.ajax({
    url: form.attr('action'),
    type: 'post',
    data: post_data,
    dataType: 'json',
    success: function (data) {
      form.find('button').text(text);
    }
  });

}