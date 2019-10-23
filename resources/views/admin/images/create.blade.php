@extends('admin.layouts.main', ['activePage' => 'GalleryCats', 'title' => __('Upload')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">UPLOAD ẢNH</h1>
            <!-- Form -->
            <form action="{{route('admin.images.store', $gallery->id)}}" method="POST" enctype="multipart/form-data"
                class="bg-white p-4 pt-5">
                @csrf
                <div class="save-group-buttons">
                    <a href="{{ Route('admin.gallery.edit', $gallery->id) }}" data-toggle="tooltip" title="Quay lại" class="btn btn-sm btn-dark" href="language.html">
                        <i class="material-icons">
                            reply
                        </i>
                    </a>
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                    <a class="btn btn-sm btn-dark" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
                        <i class="material-icons">
                            help_outline
                        </i>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Upload ảnh</label>
                            <input type="file" class="form-control" name="name" multiple="multiple" placeholder="" />
                        </div>
                        <div class="mb-2">
                            <label class="control-label">Hiển thị</label>
                            <input type="checkbox" class="checkbox-toggle" name="is_public" id="public" {{ isset($image)&&$image->is_public==1?'checked':'' }} />
                            <label class="label-checkbox" for="public">Hiển thị</label>
                            <small class="form-text">Khi tính năng “Hiển thị” được bật, bài viết này có thể
                                hiện thị trên giao diện trang web
                            </small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Url image</label>
                            <input type="text" class="form-control" name="url" placeholder="Url image" />
                            <small class="form-text">Gián đoạn link url vào, khi click vào ảnh này thì sẽ trỏ đến link
                                đã gián.
                            </small>
                        </div>
                    </div>
                </div>

                <!-- CK Editor -->
                <hr>
                <div class="row">
                    <div class="col-12">
                        <legend>Nội dung mô tả</legend>
                        <div class="form-group">
                            <textarea class="form-control" name="caption"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    CKEDITOR.replace("caption");
</script>
@endpush
