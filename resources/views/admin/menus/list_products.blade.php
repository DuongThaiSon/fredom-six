<div class="table-responsive bg-white mt-4" id="table">
    <div class="row">
        <div class="col-6 input-group">
            <input type="text" id="keyword" name="keyword" class="form-control search-input" placeholder="Tìm kiếm..."
                aria-label="Search for..." value="">
        </div>
    </div>
    <table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">
        <thead>
            <tr class="text-muted">
                <th>ID</th>
                <th>TÊN SẢN PHẨM</th>
                <th>TÊN MỤC</th>
                <th>THAO TÁC</th>
            </tr>
        </thead>
        <tbody class="product-table-body">
            @forelse ($products as $product)
            <tr class="product-item">
                <td>{{ $product->id }}</td>
                <td class="choose-record" data-id="{{ $product->id }}">{{ $product->name }}</td>
                <th>{{ $product->categories->first()->name ?? ''}}</th>
                <td>
                    <div class="btn-group">
                        <a class="btn-sm btn-success choose-record" href="#" data-id="{{ $product->id }}"
                            class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug={{ $product->slug }}>
                            <i class="material-icons">radio_button_checked</i> Chọn
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger text-center">Không có dữ liệu!</div>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
</div>
<script>
    $(document).ready(function(e){
        searchProduct();
        chooseRecord();
        buttonPaginationOnClick();
    });

    let chooseRecord = function() {
        $('.choose-record').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let slug = $(this).attr('data-slug');
            $('input[name=link]').val(slug);

            $.ajax({
                url: '/admin/menus/get-product/' + id,
                method: 'get',
                data: {},
                success: function(scs){
                resData = scs.product;
                $('#table').remove();
                var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
                    html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
                    html+= ` <tbody><tr><td>`+ resData.id + `</td>
                            <td><a target="_blank" href="/admin/products/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                            <th>`+ resData.categories['0']['name'] +`</th></tr></tbody></table>
                            <button class="btn btn-sm btn-info button-choose-product">Chọn bài viết khác</button></div>`;
                    $('.filter-result').append(html);
                    chooseOtherProduct();
                    buttonPaginationOnClick();
                },
                error: function(e){

                }
            });
        });
    };

    let chooseOtherProduct = function() {
        $('.button-choose-product').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/admin/menus/list-products',
                method: 'GET',
                success: function(scs){
                    $('#table').remove();

                    $('.filter-result').html(scs);
                    chooseRecord();
                    searchProduct();
                    buttonPaginationOnClick();
                },
                error: function(e){

                }
            });
        });
    };

    let searchProduct = function() {
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
                            let element = rowHTML(value.id, value.name, value.categories['0']['name'] ,value.slug);

                            $('.product-table-body').append(element);
                        });
                        chooseRecord();
                    },
                    error: function(e){

                    }
                });
            }, 100)
        );
    };

    let rowHTML = function(id = '', name = '', category_name = '' ,slug = '') {
        return `
        <tr class="product-item">
            <td>${id}</td>
            <td class="choose-record" data-id="${id}">${name}</td>
            <th>${category_name}</th>
            <td>
                <div class="btn-group">
                    <a class="btn-sm btn-success choose-record" href="#" data-id="${id}"
                        class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug="${slug}"
                        data-type="product">
                        <i class="material-icons">radio_button_checked</i><span style="padding-left:5px">Chọn</span>
                    </a>
                </div>
            </td>
        </tr>
        `;
    };

    let buttonPaginationOnClick = function() {
        $('.pagination a').on('click', function(e){
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(scs){
                    $('#table').remove();
                    $('.filter-result').html(scs);
                    chooseRecord();
                    searchProduct();
                    buttonPaginationOnClick();
                },
                error: function(e){

                }
            });
        })
    };
</script>
