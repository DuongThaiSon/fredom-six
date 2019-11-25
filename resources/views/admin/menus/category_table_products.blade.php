<div class="table-responsive bg-white mt-4" id="table">
    {{-- <div class="row">
        <div class="col-6 input-group">
            <input type="text" id="keyword" name="keyword" class="form-control search-input" placeholder="Tìm kiếm..."aria-label="Search for..." value="">
        </div>
    </div> --}}
    <table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">
        <thead>
            <tr class="text-muted">
                <th width="10%">ID</th>
                <th width="60%">TÊN SẢN PHẨM</th>
                {{-- <th class="w-35">TÊN MỤC</th> --}}
                <th width="30%">THAO TÁC</th>
            </tr>
        </thead>
    </table>   
    @include('admin.menus.list_category_products',['level' => 0])     
</div>
