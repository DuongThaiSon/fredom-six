import * as menus from "./menus.core.js";
$(document).ready(function(){
    $("select[name=type]").on('change', function (e) {
        e.preventDefault();
        let url = "";
        $('input[name=menuable_type]').val($(this).val());
        $('.url-group').addClass('d-none');
        if ($(this).val() == 0 && $('.url-group').hasClass('d-none') ) {
            $('.url-group').removeClass('d-none');
            $('.filter-result').empty();
        }
        if ($(this).val() == 1 || $(this).val() == 2) {
            let data = {
                type: "article",
            };
            $.ajax({
                url: '/admin/menus/get-category',
                method: 'GET',
                data: data,
                success: function success(scs) {
                    $('.filter-result').html(scs);
                    $('.selectpicker').selectpicker();
                    menus.chooseCategory();
                }
            });
        }
        if ($(this).val() == 4) {
            url = "list-articles";
            $.ajax({
                url: '/admin/menus/'+ url,
                method: 'GET',
                success: function(scs){
                    $('#table-show-record').remove();
                    $('.filter-result').html(scs);
                    menus.chooseRecord(url);
                    menus.buttonPaginationOnClick(url);
                    menus.searchArticle(url);
                //   $('input[name=link]').remove();
                }
            });
        }
        if ($(this).val() == 5 || $(this).val() == 6 ) {
            let data = {
                type: "product",
            };
            $.ajax({
                url: '/admin/menus/get-category',
                method: 'GET',
                data: data,
                success: function success(scs) {
                    $('.filter-result').html(scs);
                    $('.selectpicker').selectpicker();
                    menus.chooseCategory();
                }
            });
        }
        if ($(this).val() == 8) {
            url = "list-products";
            $.ajax({
                url: '/admin/menus/'+url,
                method: 'GET',
                success: function(scs){
                    $('#table-show-record').remove();
                    $('.filter-result').html(scs);
                    // menus.chooseProduct(url);
                    // menus.buttonProductPaginationOnClick(url);
                    // menus.searchProduct(url);
                    menus.chooseRecord(url);
                    menus.buttonPaginationOnClick(url);
                    menus.searchArticle(url);
                }
            });
        }
        if ($(this).val() == 3 || $(this).val() == 7 ) {
            $('.filter-result').empty();
        }
    });

    $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        if(menus.checkRequiredField($(this))) {
            $('#menu-form').submit();
        }
    });

    let url = "";
    if ($("select[name=type]").val() == 1 || $("select[name=type]").val() == 2 ) {
        let data = {
            type: "article",
            menuable_id: $('input[name=menuable_id]').val()
        };
        $.ajax({
            url: '/admin/menus/get-category',
            method: 'GET',
            data: data,
            success: function success(scs) {
                $('.filter-result').html(scs);
                $('.selectpicker').selectpicker();
                menus.chooseCategory();

            }
        });
    }
    if ($("select[name=type]").val() == 4) {
        url = "list-articles";
        let data = {
            menuable_id: $('input[name=menuable_id]').val()
        };
        $.ajax({
            url: '/admin/menus/'+ url,
            method: 'GET',
            data: data,
            success: function(scs){
                $('#table-show-record').remove();
                $('.filter-result').html(scs);
                menus.chooseRecord(url);
                menus.buttonPaginationOnClick(url);
                menus.searchArticle(url);
                menus.chooseOther(url);
            //   $('input[name=link]').remove();
            }
        });
    }
    if ($("select[name=type]").val() == 5 || $("select[name=type]").val() == 6) {
        let data = {
            type: "product",
            menuable_id: $('input[name=menuable_id]').val()
        };
        $.ajax({
            url: '/admin/menus/get-category',
            method: 'GET',
            data: data,
            success: function success(scs) {
                $('.filter-result').html(scs);
                $('.selectpicker').selectpicker();
                menus.chooseCategory();
            }
        });
    }
    if ($("select[name=type]").val() == 8) {
        url = "list-products";
        let data = {
            menuable_id: $('input[name=menuable_id]').val()
        };
        $.ajax({
            url: '/admin/menus/'+url,
            method: 'GET',
            data: data,
            success: function(scs){
                $('#table-show-record').remove();
                $('.filter-result').html(scs);
                // menus.chooseProduct(url);
                // menus.buttonProductPaginationOnClick(url);
                // menus.searchProduct(url);
                menus.chooseRecord(url);
                menus.buttonPaginationOnClick(url);
                menus.searchArticle(url);
                menus.chooseOther(url);
            }
        });
    }

});
