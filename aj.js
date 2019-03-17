$(function() {
      $('form').submit(function(e) {
        let $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function(html) {
			$("#blockajax").html(html),
          console.log('success');
        }).fail(function() {
          console.log('fail')});
        //отмена для submit
        e.preventDefault(); 
      });
    });
