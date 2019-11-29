$(document).ready(function () {
    // chooseColor();
  $('.checkbox-product').click(function() {
    var text = "";
    $('.checkbox-product:checked').each(function() {
    text += $(this).val() + ',' });
    text = text.substring(0, text.length-1);
    $('#tags').val(text);
  });

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.btn-add-cart').click(function(e)
      {
        e.preventDefault();
        let data = {
            id: $(this).attr('data-id'),
            quantity: 1,
        };
        $.ajax({
          url: '/cart/add',
          method: 'POST',
          data: data,
          success: function(scs){
            $('.cart-items').text(scs.quantity);
          },
          error: function(){

          }

        });
      });
});

let chooseColor = function() {
    $('.choose-color').on('click', function(e) {
        e.preventDefault();
        $('.choose-color').each(function(e) {
            if($(this).hasClass('click-choose-color'))
            {
                $(this).removeClass('click-choose-color');
            }
        });
        $(this).addClass('click-choose-color');
        $('input[name=color]').val($(this).data('color'));
    });
};
