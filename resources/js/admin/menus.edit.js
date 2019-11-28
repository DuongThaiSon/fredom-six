$(document).ready(function(){
    $("select[name=type]").on('change', function (e) {
        e.preventDefault();
        let url = "";
        if ($(this).val() == 4) {
            url = "list-articles";
            // ajaxCall(url, 'get-article', 'articles');
            $.ajax({
                url: '/admin/menus/'+url,
                method: 'GET',
                success: function(scs){
                    $('#table-show-record').remove();
                    $('.filter-result').html(scs);
                    chooseRecord(url, 'get-article', 'articles');
                    buttonPaginationOnClick(url, 'get-article', 'articles');
                    searchArticle(url, 'get-article', 'articles');
                //   $('input[name=link]').remove();
                }
            });
        }
        if ($(this).val() == 8) {
            url = "list-products";
            // ajaxCall(url, 'get-product', 'products');
            $.ajax({
                url: '/admin/menus/'+url,
                method: 'GET',
                success: function(scs){
                    $('#table-show-record').remove();
                    $('.filter-result').html(scs);
                    chooseRecordProduct(url, 'get-product', 'products');
                    buttonPaginationOnClick(url, 'get-product', 'products');
                    searchProduct(url, 'get-product', 'products');
                //   $('input[name=link]').remove();
                }
            });
        }
        if ($(this).val() == 5) {
            url = "list-category-product"; // ajaxCall(url, 'get-product', 'products');
      
            $.ajax({
              url: '/admin/menus/' + url,
              method: 'GET',
              success: function success(scs) {
                // $('#table-show-record').remove();
                $('.filter-result').html(scs);
                chooseRecordCategoryProduct(url, 'get-category-product', 'category-product');
                // buttonPaginationOnClick(url, 'get-product', 'products');
                // searchProduct(url, 'get-product', 'products'); //   $('input[name=link]').remove();
              }
            });
          }
        if ($(this).val() == 1) {
            url = "list-category-article"; // ajaxCall(url, 'get-product', 'products');
        
            $.ajax({
                url: '/admin/menus/' + url,
                method: 'GET',
                success: function success(scs) {
                // $('#table-show-record').remove();
                $('.filter-result').html(scs);
                chooseRecordCategoryProduct(url, 'get-category-article', 'category-article');
                // buttonPaginationOnClick(url, 'get-product', 'products');
                // searchProduct(url, 'get-product', 'products'); //   $('input[name=link]').remove();
                }
            });
        }
    });

  });

//   let ajaxCall = function(url, getUrl, type) {
//     $.ajax({
//         url: '/admin/menus/'+url,
//         method: 'GET',
//         success: function(scs){
//             $('#table-show-record').remove();
//             $('.filter-result').html(scs);
//             chooseRecord(url, getUrl, type);
//             buttonPaginationOnClick(url, getUrl, type);
//             searchArticle(url, getUrl, type);
//         //   $('input[name=link]').remove();
//         }
//       });
//    };

   let chooseRecord = function(url, getUrl, type) {
        $('.choose-record').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let slug = $(this).attr('data-slug');
            $('input[name=link]').val(slug);

            $.ajax({
                url: '/admin/menus/'+ getUrl +'/' + id,
                method: 'get',
                success: function(scs){
                resData = scs.results;
                $('#table').remove();
                var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
                    html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
                    html+= ` <tbody><tr><td>`+ resData.id + `</td>
                            <td><a target="_blank" href="/admin/`+ type +`/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                            <th>`+ resData.category['name'] +`</th></tr></tbody></table>
                            <button class="btn btn-sm btn-info button-choose-other">Chọn bài viết khác</button></div>`;
                    $('.filter-result').append(html);
                    chooseOther(url, getUrl, type);
                    buttonPaginationOnClick(url, getUrl, type);
                },
                error: function(e){

                }
            });
        });
    };

    let chooseOther = function(url, getUrl, type) {
        $('.button-choose-other').click(function(e) {
            e.preventDefault();
            $('input[name=link]').val("");
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecord(url, getUrl, type);
                    buttonPaginationOnClick(url, getUrl, type);
                }
            });
        });
    };

    let buttonPaginationOnClick = function(url, getUrl, type) {
        $('.pagination a').on('click', function(e){
            e.preventDefault();
            let _url = $(this).attr('href');
            $.ajax({
                url: _url,
                method: 'GET',
                success: function(scs){
                    $('.filter-result').html(scs);
                    chooseRecord(url, getUrl, type);
                    buttonPaginationOnClick(url, getUrl, type);
                }
            });
        })
    };

    let searchArticle = function(url, getUrl, type) {
        $('.search-input').on('keyup',
            _.debounce(function(e) {
                e.preventDefault();
                let keyword = $(this).val();
                $.ajax({
                    url: '/admin/menus/search-articles',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(scs){
                        $('.article-item').remove();
                        _.forEach(scs.articles, function(value) {
                            let element = rowHTML(value.id, value.name, value.category['name'] ,value.slug);
                            $('.article-table-body').append(element);
                        });
                        chooseRecord(url, getUrl, type);
                    }
                });
            }, 500)
        );
    };

    let rowHTML = function(id = '', name = '', category_name = '' ,slug = '') {
        return `
        <tr class="article-item">
            <td>${id}</td>
            <td class="choose-record" data-id="${id}">${name}</td>
            <th>${category_name}</th>
            <td>
                <div class="btn-group">
                    <a class="btn-sm btn-success choose-record" href="#" data-id="${id}"
                        class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug="${slug}"
                        data-type="article">
                        <i class="material-icons">radio_button_checked</i><span style="padding-left:5px">Chọn</span>
                    </a>
                </div>
            </td>
        </tr>
        `;
    };


    let chooseRecordProduct = function(url, getUrl, type) {
        $('.choose-record').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let slug = $(this).attr('data-slug');
            $('input[name=link]').val(slug);

            $.ajax({
                url: '/admin/menus/'+ getUrl +'/' + id,
                method: 'get',
                success: function(scs){
                resData = scs.results;
                $('#table').remove();
                var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
                    html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
                    html+= ` <tbody><tr><td>`+ resData.id + `</td>
                            <td><a target="_blank" href="/admin/`+ type +`/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                            <th>`+ resData.categories[0]['name'] +`</th></tr></tbody></table>
                            <button class="btn btn-sm btn-info button-choose-other">Chọn bài viết khác</button></div>`;
                    $('.filter-result').append(html);
                    chooseOtherProduct(url, getUrl, type);
                    buttonPaginationOnClickProduct(url, getUrl, type);
                },
                error: function(e){

                }
            });
        });
    };

    let chooseOtherProduct = function(url, getUrl, type) {
        $('.button-choose-other').click(function(e) {
            e.preventDefault();
            $('input[name=link]').val("");
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecordProduct(url, getUrl, type);
                    buttonPaginationOnClickProduct(url, getUrl, type);
                }
            });
        });
    };

    let buttonPaginationOnClickProduct = function(url, getUrl, type) {
        $('.pagination a').on('click', function(e){
            e.preventDefault();
            let _url = $(this).attr('href');
            $.ajax({
                url: _url,
                method: 'GET',
                success: function(scs){
                    $('.filter-result').html(scs);
                    chooseRecordProduct(url, getUrl, type);
                    buttonPaginationOnClickProduct(url, getUrl, type);
                }
            });
        })
    };

    let searchProduct = function(url, getUrl, type) {
        $('.search-input').on('keyup',
            _.debounce(function(e) {
                e.preventDefault();
                let keyword = $(this).val();
                $.ajax({
                    url: '/admin/menus/search-products',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(scs){
                        $('.product-item').remove();
                        _.forEach(scs.products, function(value) {
                            let element = rowHTML(value.id, value.name, value.categories[0]['name'] ,value.slug);
                            $('.product-table-body').append(element);
                        });
                        chooseRecordProduct(url, getUrl, type);
                    }
                });
            }, 500)
        );
    };

    let rowHTMLProduct = function(id = '', name = '', category_name = '' ,slug = '') {
        return `
        <tr class="article-item">
            <td>${id}</td>
            <td class="choose-record" data-id="${id}">${name}</td>
            <th>${category_name}</th>
            <td>
                <div class="btn-group">
                    <a class="btn-sm btn-success choose-record" href="#" data-id="${id}"
                        class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug="${slug}"
                        data-type="article">
                        <i class="material-icons">radio_button_checked</i><span style="padding-left:5px">Chọn</span>
                    </a>
                </div>
            </td>
        </tr>
        `;
    };

    let chooseRecordCategoryProduct = function(url, getUrl, type) {
        $('.choose-record').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let slug = $(this).attr('data-slug');
            $('input[name=link]').val(slug);

            $.ajax({
                url: '/admin/menus/'+ getUrl +'/' + id,
                method: 'get',
                success: function(scs){
                resData = scs.results;
                $('#table').remove();
                var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
                    html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
                    html+= ` <tbody><tr><td>`+ resData.id + `</td>
                            <td><a target="_blank" href="/admin/`+ type +`/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                            </tr></tbody></table>
                            <button class="btn btn-sm btn-info button-choose-other">Chọn bài viết khác</button></div>`;
                    $('.filter-result').append(html);
                    chooseOtherProductCategory(url, getUrl, type);
                    // buttonPaginationOnClickProduct(url, getUrl, type);
                }
            });
        });
    };

    let chooseOtherProductCategory = function(url, getUrl, type) {
        $('.button-choose-other').click(function(e) {
            e.preventDefault();
            $('input[name=link]').val("");
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecordCategoryProduct(url, getUrl, type);
                    // buttonPaginationOnClickProduct(url, getUrl, type);
                }
            });
        });
    };
    let chooseRecordCategoryArticle = function(url, getUrl, type) {
        $('.choose-record').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let slug = $(this).attr('data-slug');
            $('input[name=link]').val(slug);

            $.ajax({
                url: '/admin/menus/'+ getUrl +'/' + id,
                method: 'get',
                success: function(scs){
                resData = scs.results;
                $('#table').remove();
                var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
                    html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
                    html+= ` <tbody><tr><td>`+ resData.id + `</td>
                            <td><a target="_blank" href="/admin/`+ type +`/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                            </tr></tbody></table>
                            <button class="btn btn-sm btn-info button-choose-other">Chọn bài viết khác</button></div>`;
                    $('.filter-result').append(html);
                    chooseOtherArticleCategory(url, getUrl, type);
                    // buttonPaginationOnClickArticle(url, getUrl, type);
                }
            });
        });
    };

    let chooseOtherArticleCategory = function(url, getUrl, type) {
        $('.button-choose-other').click(function(e) {
            e.preventDefault();
            $('input[name=link]').val("");
            $.ajax({
                url: '/admin/menus/'+ url ,
                method: 'GET',
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecordCategoryArticle(url, getUrl, type);
                    // buttonPaginationOnClickArticle(url, getUrl, type);
                }
            });
        });
    };