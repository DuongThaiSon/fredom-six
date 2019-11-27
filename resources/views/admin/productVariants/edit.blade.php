<form class="form-update-variant" action="{{ route('admin.variants.update', ['product' => $product->id, 'variant' => $variant->id]) }}" method="post">
    <div class="row">
        <div class="col-md-6">
            <legend>&nbsp;</legend>
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
                name="variant_product_code"
                required
                class="form-control"
                placeholder=""
                value="{{$variant->product_code ?? ''}}"
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
            <div class="mb-2">
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
            </div>
        </div>
    
        <div class="col-lg-6">
            <legend>&nbsp;</legend>
    
            <div class="form-group">
                <label class="control-label">Ảnh đại diện</label>
            </div>
            <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new img-thumbnail" style="width: 400px; height: 300px;">
                        <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $variant->avatar }}"  alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 400px; max-height: 300px;"></div>
                    <div>
                        <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="variant_avatar"></span>
                        <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>