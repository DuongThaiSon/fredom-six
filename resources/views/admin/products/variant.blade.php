<div class="row">
    <div class="col-lg-6">
        <a href=".modal-select-attribute-form" class="btn btn-primary border rounded" data-toggle="modal">
            Chọn thuộc tính
        </a>
    </div>
    <div class="bg-white mt-4 col-12 product-variants-list">
        <table class="table-sm table-hover table mb-2" width="100%" id="variant-table"
            data-reorder="{{ route('admin.products.reorder') }}"
            data-list="{{ route('admin.variants.index', $product->id) }}">
            <thead>
                <tr class="text-muted">
                    <th width="5%"></th>
                    <th width="30%">Tên sản phẩm</th>
                    <th width="20%" class="text-right">Số lượng</th>
                    <th width="20%" class="text-right">Đơn giá</th>
                    <th width="10%" class="text-right">Thao tác</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade bd-modal-lg modal-select-attribute-form" tabindex="-1" role="dialog"
    aria-labelledby="selectAttributeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chọn thuộc tính để tạo biến thể</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-sm">
                        <tbody width="100%">
                            @forelse ($productAttributes as $attribute)
                            <tr>
                                <td width="30%">
                                    <div class="pretty p-default p-curve p-bigger p-smooth">
                                        <input type="checkbox" value="{{ $attribute->id }}" data-name="attribute" />
                                        <div class="state p-primary-o">
                                            <label>{{ $attribute->name }}</label>
                                        </div>
                                    </div>
                                </td>
                                <td width="70%">
                                    <select multiple data-name="attribute-option" data-selected-text-format="count > 0"
                                        class="selectpicker form-control attribute-selectpicker"
                                        data-count-selected-text="{0} mục đã được chọn"
                                        data-style="select-with-transition" title="Chọn thuộc tính cho sản phẩm"
                                        data-size="7" data-show-tick="true">

                                        @forelse ($attribute->productAttributeOptions as $attributeOption)
                                        <option value="{{ $attributeOption->id }}">
                                            {{ $attributeOption->value }}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>Chưa có thuộc tính nào. <a href="{{ route('admin.product-attributes.create') }}"
                                        target="_blank">Thêm mới ngay</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-make-variation rounded"
                    data-href="{{ route('admin.variants.store', $product->id) }}">Tạo biến thể</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="variant-edit-modal" tabindex="-1" role="dialog" aria-labelledby="variant-edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrol-lable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="variant-edit-modal-label">Cập nhật thông tin biến thể</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-submit-variant-edit rounded">Lưu</button>
            </div>
        </div>
    </div>
</div>
