@extends('admin.layouts.main')
@section('content')
<form action="{{route('admin.images.update', $gallery->id, $image->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <button class=" btn button-primary align-items-center" title="lưu">Lưu</button>
    <div class="row">
        <div class="col-6">
            <div class="fa-upload form-group">
                <label>FILE UPLOAD</label><br>
                <input id="img" type="file" name="name" value="{{$image->name}}"><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" value="{{$image->url}}">
            </div>  
        </div> 
    </div>
    <div class="row">
        <img id="avatar" class="thumbnail" width="300px" height="300px" height="350px" src="{{$image->name}}">
    </div>
    <div class="row">
        <div class="col-12">
            <legend>Nội dung tóm tắt</legend>
            <div class="form-group">
                <textarea class="form-control" name="caption">{{$image->caption}}</textarea>
            </div>
        </div>
    </div>
</form>
@endsection
