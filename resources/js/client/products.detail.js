$(document).ready(function(){
    rateStar();
    postComment();
    productStarRate();
    loadComment();
    fixReview();
    likeMePls();
    chooseColor();
    $('.write-review').click(function(e) {
        $('#review-tab').tab("show");
    });
});

let rateStar = function() {
    var stars = $('#rating .rate-product'),
    radios = $(':radio[name="rating"]' );

    stars.hover(
    function(){
    var $this = $(this);
    $this.prevAll().addBack().addClass('hoverStars');
    },
    function(){
    var $this = $(this);
    $this.prevAll().addBack().removeClass('hoverStars');
    });
    stars.on('click', function(){
    var $this = $(this);
    $this.siblings().removeClass('clickStars')
    $this.prevAll().addBack().addClass('clickStars');
    });
};


let postComment = function() {
    $(".btn-comment").off();
    $('.btn-comment').on('click',function(e) {
        e.preventDefault();
        if($('.comment-zone').val() == "")
        {
            alert('Bạn chưa nhập nội dung!');
            $('.comment-zone').focus();
        }
        else if ($('input[name=rating]').val() == "")
        {
            alert('Bạn chưa đánh giá sản phẩm!');
        }
        else if ($('input[name=current-user]').val() == "")
        {
            alert('Có lỗi xảy ra!')
        }
        else
        {
            let data = {

                comment: $('.comment-zone').val(),
                rating: $('input[name=rating]').val(),
                currentUser: $('input[name=current-user]').val()
            };
            let id = $('.btn-buy-now').data('id');
            $.ajax({
                url: `/products/${id}/reviews`,
                method: "POST",
                data: data,
                success: function(scs) {
                    // $('input[name=rating]').val("");
                    // $('.comment-zone').val("");
                    // $('.ratingStars').removeClass('clickStars');
                    // $('.product-comment').remove();
                    alert('Cảm ơn bạn đã đánh giá sản phẩm!')
                    $('.btn-comment').addClass('d-none');
                    $('.btn-fix-review').removeClass('d-none');
                    loadComment();
                }
            })
        }
    });
};

let productStarRate = function() {
    $('.rate-product').on('click', function(e) {
        e.preventDefault();
        $('input[name=rating]').val($(this).data('star'));
    });
};

let loadComment = function() {
    let id = $('.btn-buy-now').data('id')
    $.ajax({
        url: `/products/${id}/reviews`,
        method: "GET",
        success: function(scs) {
            $('.list-comments').html(scs);
            buttonPaginationOnClick();
        }
    })
};

let buttonPaginationOnClick = function() {
    $('.pagination a').on('click', function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            method: 'GET',
            success: function(scs){
                $('.product-comment').remove();
                $('.list-comments').html(scs);
                buttonPaginationOnClick();
            }
        });
    })
};

let fixReview = function() {
    $('.btn-fix-review').on('click', function(e) {
        e.preventDefault();
        if($('.comment-zone').val() == "")
        {
            alert('Bạn chưa nhập nội dung!');
            $('.comment-zone').focus();
        }
        else if ($('input[name=rating]').val() == "")
        {
            alert('Bạn chưa đánh giá sản phẩm!');
        }
        else if ($('input[name=current-user]').val() == "")
        {
            alert('Có lỗi xảy ra!')
        }
        else
        {
            let data = {
                content: $('.comment-zone').val(),
                rate: $('input[name=rating]').val(),
                _method: "PUT"
            };
            let id = $('.btn-buy-now').data('id');
            let user_id = $('input[name=current-user]').val();
            $.ajax({
                url: `/products/${id}/reviews/${user_id}`,
                method: "POST",
                data: data,
                success: function(scs) {
                    // $('input[name=rating]').val("");
                    // $('.comment-zone').val("");
                    // $('.ratingStars').removeClass('clickStars');
                    // $('.product-comment').remove();
                    $('.btn-fix-review').attr('disabled', 'disabled');
                    alert('Bạn đã sửa đánh giá thành công!')
                    loadComment();
                }
            })
        }
    })
};

let likeMePls = function() {
    $('.like-button').on('click', function(e) {
        e.preventDefault();
        let data = {
            product_id: $('input[name=product_id]').val(),
            user_id: $('input[name=user_id]').val(),
        }
        console.log(data);
        $.ajax({
            url: $('.like-button').data('href'),
            method: 'POST',
            data: data,
            success: function(scs) {
                alert('Cảm ơn bạn đã thích sản phẩm của chúng tôi!');
                $('.like-button').addClass('is-like');
                $(".like-button").attr('disabled', 'disabled');
            }
        })
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
