$(document).ready(function () {
    
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
        }
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
})