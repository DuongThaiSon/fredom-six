<form class="form-update-variant" action="" method="post">
    <div class="row">
        <div class="col-12 col-lg-6">
            <legend>&nbsp;</legend>
            <input type="hidden" name="variant_update_url" value="{{ route('admin.variants.update', ['productId' => $product->id, 'variantId' => $variant->id]) }}">
            <div class="form-group">
                <label>@importantfield Tiêu đề sản phẩm</label>
                <input
                type="text"
                name="variant_name"
                required
                class="form-control"
                placeholder="The cat in the hat"
                value="{{$variant->name ?? ''}}"
                />
                <small class="form-text">Tên sản phẩm</small>
            </div>

            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input
                type="text"
                required
                class="form-control price-format price-input"
                placeholder=""
                value="{{$variant->price ?? ''}}"
                name="variant_price"
                />
                <small class="form-text">Giá của sản phẩm</small>
            </div>

            <div class="form-group">
                <label>Mã sản phẩm</label>
                <input
                type="text"
                name="variant_sku"
                required
                class="form-control"
                placeholder=""
                value="{{$variant->sku ?? ''}}"
                />
                <small class="form-text">Mã sản phẩm</small>
            </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input
                type="text"
                name="variant_quantity"
                required
                class="form-control"
                placeholder="The cat in the hat"
                value="{{$variant->quantity ?? ''}}"
                />
                <small class="form-text">Số lượng sản phẩm</small>
            </div>

            <!-- Button Toggle -->
            {{-- <div class="mb-2">
                <label class="control-label">
                    Hiển thị
                    <input
                        type="checkbox"
                        name="variant_is_public"
                        id="variant_public"
                        value="1"
                        {{ isset($variant)&&$variant->is_public==1?'checked':'' }}
                    />
                    <small class="form-text">
                        Khi tính năng “Hiển thị” được bật, sản phẩm này có thể
                        hiện thị trên giao diện trang web
                    </small>
                </label>
            </div> --}}
        </div>

        <div class="col-12 col-lg-6">
            <legend>&nbsp;</legend>
            <div class="form-group">
                <label class="control-label">Ảnh đại diện</label>
                <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                    @if ( isset($products) && $products->avatar)
                    <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ asset(env('UPLOAD_DIR_PRODUCT', 'media/images/products')) . "/{$products->avatar}" }}"
                            alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists img-thumbnail"
                        style="max-width: 200px; max-height: 150px;"></div>
                    @else
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                        style="width: 200px; height: 150px;"></div>
                    @endif
                    <div>
                        <span class="btn btn-outline-secondary btn-file border-0 p-0 rounded">
                            <span class="fileinput-new btn btn-outline-secondary btn-sm">Select
                                image</span>
                            <span
                                class="fileinput-exists btn btn-outline-secondary btn-sm">Change</span>
                            <input type="file" name="variant_avatar" class="">
                        </span>
                        <a href="#"
                            class="btn btn-outline-secondary btn-sm fileinput-exists rounded"
                            data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
