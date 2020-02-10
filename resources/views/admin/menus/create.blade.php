@extends('admin.layouts.main', ['activePage' => 'menus-categories', 'title' => __('Menu create')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <a href="{{ route('admin.menus.index', ['category' => $category->id]) }}" class="btn btn-sm btn-dark"
                data-toggle="tooltip" title="">
                <i class="material-icons">
                    keyboard_arrow_left
                </i>
                <span class="pt-5">Quay lại</span>
            </a>
            <h1 class="mt-3 pl-4">THÔNG TIN MENU</h1>
            @if ($errors->any())
            @component('admin.partials.alert')
                @slot('type', 'danger')
                {{ $errors->first() }}
            @endcomponent
            @endif
            <!-- Save group button -->
            <form action="{{ route('admin.menus.store', ['category' => $categoryId]) }}" method="POST"
                enctype="multipart/form-data" class="bg-white mt-3 mb-0 p-4 pt-5" id="submit-menu-form">
                @csrf
                <div class="save-group-buttons">
                    <a class="btn btn-sm btn-dark" href="{{ route('admin.menus.index', $categoryId) }}">
                        <i class="material-icons"> menu_open </i>
                    </a>
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons"> save</i>
                    </button>
                    <a class="btn btn-sm btn-dark"
                        href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                        target="_blank">
                        <i class="material-icons"> help_outline </i>
                    </a>
                </div>
                <!-- End group button -->
                <!-- Form -->
                <div class="row">
                    <div class="col-md-6">
                        <legend>Thông tin cơ bản</legend>

                        <div class="form-group">
                            <label>Tên hiển thị @importantfield</label>
                            <input type="text" name="name" required class="form-control" placeholder="Tên menu" />
                            <small class="form-text">Tên hiển thị trên website của menu</small>
                        </div>

                        <div class="form-group">
                            <label>Nằm trong Menu</label>
                            <select name="parent_id" class="form-control">
                                <option value="0"></option>
                                @include('admin.partials.menuOptions')
                            </select>
                            <small class="form-text">Menu cha của menu</small>
                        </div>

                        <div class="form-group">
                            <label>Loại Menu</label>
                            <select name="type" class="form-control" id="list-option">
                                @forelse ($menuType as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @empty
                                @endforelse
                            </select>
                            <small class="form-text">Chọn mục cho dữ liệu này, bạn không nên để trống</small>
                        </div>
                        <div class="form-group url-group">
                            <label>URL</label>
                            <input type="text" name="link" class="form-control" placeholder="URL Link" />
                            <small class="form-text">Khi click vào menu này sẽ chuyển hướng đến URL chỉ định</small>
                        </div>
                        <input type="hidden" name="category_id" value="{{ $categoryId }}"/>
                    </div>

                    <div class="col-lg-6 border-gray">
                        @include('admin.menus.explanation')
                    </div>
                    <hr>
                    @include('admin.menus.query')
                </div>
            </form>
            <!-- End form -->

        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/menus.create.js"></script>
@endpush
