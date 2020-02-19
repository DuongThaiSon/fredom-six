<div class="row">
    <div class="col-lg-6">
        <a href=".modal-select-attribute-form" class="btn btn-primary border rounded" data-toggle="modal">
            Chọn thuộc tính
        </a>
    </div>
    <div class="table-responsive bg-white mt-4 col-12 product-variants-list">
    </div>
</div>

<div class="modal fade bd-modal-lg modal-select-attribute-form" tabindex="-1" role="dialog"
    aria-labelledby="selectAttributeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông số cài đặt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @forelse ($productAttributes as $attribute)
                <div class="row my-2">
                    <div class="col-6">
                        <div class="pretty p-default p-curve p-bigger p-smooth">
                            <input type="checkbox" />
                            <div class="state p-primary-o">
                                <label>{{ $attribute->name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <select multiple name="attributes" data-selected-text-format="count > 0"
                            class="selectpicker form-control attribute-selectpicker"
                            data-count-selected-text="{0} mục đã được chọn" data-style="select-with-transition"
                            title="Chọn thuộc tính cho sản phẩm" data-size="7" data-show-tick="true">

                            @forelse ($attribute->productAttributeOptions as $attributeOption)
                            <option value="{{ $attributeOption->id }}">
                                {{ $attributeOption->value }}
                            </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                @empty
                <div class="my-4">
                    <p>Chưa có thuộc tính nào. <a href="{{ route('admin.product-attributes.create') }}"
                            target="_blank">Thêm mới ngay</a></p>
                </div>
                @endforelse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-submit rounded">Lưu</button>
            </div>
        </div>
    </div>
</div>
