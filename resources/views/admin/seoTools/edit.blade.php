@extends('admin.layouts.main', ['activePage' => 'seo-tools', 'title' => __('Tạo mới công cụ SEO')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Sửa công cụ SEO: {{ $seoTool->name }}</h1>
            <form action="{{route('admin.seo-tools.update', $seoTool->id )}}" method="POST" enctype="multipart/form-data"
                class="bg-white mt-3 p-4 pt-5">
                @csrf
                @method('PUT')
                @if ($errors->any())
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel">
                        <use xlink:href="#stroked-cancel"></use>
                    </svg>{{ $errors->first() }}<a href="#" class="pull-right"><span
                            class="glyphicon glyphicon-remove"></span></a>
                </div>
                @endif

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                    <a class="btn btn-sm btn-dark"
                        href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                        target="_blank">
                        <i class="material-icons">
                            help_outline
                        </i>
                    </a>
                </div>
                <!-- Form -->

                <div class="col-12">
                    <legend>Thông tin cơ bản</legend>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" readonly="readonly" value="{{ $seoTool->id }}" />
                        <small class="form-text">ID là mã của công cụ, đây là một thuộc tính duy
                            nhất</small>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="name" required class="form-control"
                            placeholder="Ví dụ: Google Analytics, Facbook Pixel, ..." value="{{ $seoTool->name ?? old('name') }}" />
                        <small class="form-text">Tiêu đề của công cụ SEO</small>
                    </div>
                    <div class="form-group">
                        <label>SCRIPT</label>
                        <textarea name="script" class="form-control" id="" cols="30" rows="10">{{ $seoTool->script ?? old('script') }}</textarea>
                        <small class="form-text">Đoạn SCRIPT được lưu vào trang web</small>
                    </div>
                </div>

                <!-- CK Editor -->
                <hr>

            </form>
        </div>
    </div>
</div>
@endsection
