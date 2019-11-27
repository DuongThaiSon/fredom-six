@extends('admin.layouts.main', ['activePage' => 'partner-create', 'title' => __('Sửa đối tác vận chuyển')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Thông tin đối tác vận chuyển</h1>
            <form action="{{route('admin.partners.update', $partner->id )}}" method="POST" enctype="multipart/form-data"
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
                        <input type="text" name="id" class="form-control" readonly="readonly" value="{{ $partner->id ?? '' }}" />
                        <small class="form-text">ID là mã của đối tác, đây là một thuộc tính duy
                            nhất</small>
                    </div>

                    <div class="form-group">
                        <label>Tên đối tác vận chuyển</label>
                        <input type="text" name="name" required class="form-control"
                            placeholder="Đơn vị vận chuyển A" value="{{ $partner->name ?? old('name') }}" />
                        <small class="form-text">Tên của đối tác vận chuyển</small>
                    </div>
                    <div class="form-group">
                        <label>Giá tiền (VNĐ)</label>
                        <input type="text" name="price" required class="form-control"
                            placeholder="{{ number_format('50000') }}" value="{{ number_format($partner->price) ?? old('price') }}" />
                        <small class="form-text">Giá tiền vận chuyển của đối tác</small>
                    </div>
                </div>

                <!-- CK Editor -->
                <hr>

            </form>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
