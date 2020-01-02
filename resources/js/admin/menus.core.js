export function chooseRecord(url) {
    $('.choose-record').on('click', function(e){
        e.preventDefault();
        $('input[name=menuable_id').val($(this).data('id'));
        $('.item').not($(this).parents('.item')).remove();
        $('.btn-choose').empty();
        $('.btn-choose').append(`<button class="btn btn-sm btn-info button-choose-other">Chọn mục khác</button>`);
        $('.pagination').remove();
        $('.search-input').attr('readonly', true);
        chooseOther(url);
    });
};

export function chooseOther(url) {
    $('.button-choose-other').click(function(e) {
        e.preventDefault();
        $('input[name=menuable_id').val("");
        // $('input[name=link]').val("");
        $.ajax({
            url: '/admin/menus/'+ url ,
            method: 'GET',
            success: function(scs){
                $('#table').remove();
                $('.filter-result').html(scs);
                chooseRecord(url);
                buttonPaginationOnClick(url);
                searchArticle(url);
            }
        });
    });
};

export function buttonPaginationOnClick(url) {
    $('.pagination a').on('click', function(e){
        e.preventDefault();
        let _url = $(this).attr('href');
        $.ajax({
            url: _url,
            method: 'GET',
            success: function(scs){
                $('.filter-result').html(scs);
                chooseRecord(url);
                buttonPaginationOnClick(url);
            }
        });
    })
};

export function searchArticle(url) {
    $('.search-input').on('keyup',
        _.debounce(function(e) {
            e.preventDefault();
            let keyword = $(this).val();
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                data: {
                    keyword: keyword
                },
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecord(url);
                    buttonPaginationOnClick(url);
                    searchArticle(url);
                }
            });
        }, 500)
    );
};

export function chooseCategory() {
    // $('.menu-category').off();
    $('#menu-category').on('changed.bs.select',function(e) {
        // e.preventDefault();
        // console.log($(this).val());

        $('input[name=menuable_id').val($(this).val());
    });
};

export function chooseProduct(url) {
    $('.choose-record').on('click', function(e){
        e.preventDefault();
        $('input[name=menuable_id').val($(this).data('id'));
        $('.product-item').not($(this).parents('.product-item')).remove();
        $('.btn-choose').empty();
        $('.btn-choose').append(`<button class="btn btn-sm btn-info button-choose-other">Chọn sản phẩm khác</button>`);
        $('.pagination').remove();
        $('.search-input').attr('readonly', true);
        chooseOtherProduct(url);
    });
};

export function chooseOtherProduct(url) {
    $('.button-choose-other').click(function(e) {
        e.preventDefault();
        $('input[name=menuable_id').val("");
        // $('input[name=link]').val("");
        $.ajax({
            url: '/admin/menus/'+ url ,
            method: 'GET',
            success: function(scs){
                $('#table').remove();
                $('.filter-result').html(scs);
                chooseProduct(url);
                buttonProductPaginationOnClick(url);
                searchProduct(url);
            }
        });
    });
};

export function buttonProductPaginationOnClick(url) {
    $('.pagination a').on('click', function(e){
        e.preventDefault();
        let _url = $(this).attr('href');
        $.ajax({
            url: _url,
            method: 'GET',
            success: function(scs){
                $('.filter-result').html(scs);
                chooseProduct(url);
                buttonProductPaginationOnClick(url);
            }
        });
    })
};

export function searchProduct(url) {
    $('.search-input').on('keyup',
        _.debounce(function(e) {
            e.preventDefault();
            let keyword = $(this).val();
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                data: {
                    keyword: keyword
                },
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseProduct(url);
                    buttonProductPaginationOnClick(url);
                    searchProduct(url);
                }
            });
        }, 500)
    );
};

export function checkRequiredField(context) {
    let isValidate = true;
    let fields = $(context).parents('#menu-form').find('input,textarea,select').filter('[required]');
    fields.each(function() {
        if (!$(this).val().length) {
            isValidate = false;
        }
    });
    if($("select[name=type]").val() != 0 && $('input[name=menuable_id]').val().length == 0) {
        isValidate = false;
    }
    if(!isValidate) {
        Swal.fire({
            title: "Lỗi",
            text: "Errr... Bạn chưa điền hết thông tin bắt buộc!",
            icon: "error",
            confirmButtonColor: "red",
        });
    }

    return isValidate;
};
