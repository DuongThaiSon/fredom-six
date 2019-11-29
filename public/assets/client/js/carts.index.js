
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    chooseColor();
    $('.input-quantity').change(function (e) {
        e.preventDefault();
        changeQuantity($(this));
    });

      $('.btn-remove-product').on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let _this = $(this);
        if (confirm('Bạn có chắc chắn muốn xóa không?')) {
          $.ajax({
            url: '/cart/destroy',
            method: 'POST',
            data: {
              id: id
            },
            success: function () {
              _this.parents('.product-cart').remove();
              location.reload()
            },

          });
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
    changeQuantityButton();
});

let changeQuantityButton = function(){
    $('.my-auto').on('click', function(e){
        changeQuantity($(this));
    });
};

let changeQuantity = function(__this) {
    let data = {
        id: __this.parents('.product-cart').find('.input-quantity').attr('data-id'),
        quantity: __this.parents('.product-cart').find('.input-quantity').val(),
    }

    let _this = __this;
    $.ajax({
        url: '/cart/update',
        method: 'POST',
        data: data,
        success: function (scs) {
            _this.parents('.product-cart').find('.summed-price').text(`${scs.summedPrice}`);
            $('.sub-total').text(`${scs.subTotal}`);
            $('.total-price').text(`${scs.totalPrice}`);
        },
        error: function () {

        }
    });
};

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

