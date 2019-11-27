<table class="table-sm table-hover table mb-2" width="100%">
    <thead>
        <tr class="text-muted">
            <th width="5%"></th>
            <th  width="5%" class="text-center">
                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                    <i class="material-icons text-muted">check_box_outline_blank</i>
                </a>
            </th>
            <th width="30%">Tên sản phẩm</th>
            <th width="5%" >Hiển thị</th>
            <th width="20%" >Số lượng</th>
            <th width="20%" class="text-right">Đơn giá</th>
            <th width="10%" class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody class="sort variant-sort" data-href="{{ route('admin.variants.reorder', $product->id) }}">
        @include('admin.productVariants.list')
    </tbody>
</table>

{{ $products->links('admin.productVariants.pagination') }}