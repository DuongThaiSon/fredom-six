@extends('admin.layouts.main')
@section('content')

<form action="{{route('admin.images.store', $gallery->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    <button class=" btn button-primary align-items-center" title="lưu">Lưu</button>
    {{-- @method('DELETE') --}}
    {{-- <button class=" btn button-dark align-items-center" title="xoá">Xoá</button> --}}
    <div class="row">
        <div class="col-6">
            <div class="fa-upload form-group">
                <label>FILE UPLOAD</label><br>
                <input id="img" type="file" name="name[]" multiple="multiple"><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control">
            </div>  
        </div> 
    </div>
    <div class="row">
        <img id="avatar" class="thumbnail" width="300px" height="300px" height="350px" src="#">
    </div>
    <div class="row">
        <div class="col-12">
            <legend>Nội dung tóm tắt</legend>
            <div class="form-group">
                <textarea class="form-control" name="caption"></textarea>
            </div>
        </div>
    </div>
</form>
@endsection
