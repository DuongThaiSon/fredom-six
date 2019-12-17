@extends('admin.layouts.main', ['activePage' => 'product-filter-category', 'title' => __('Create Products Filters')])
@section('content')
<!-- Content -->
<div id="main-content">
<div class="container-fluid" style="background: #e5e5e5;">
  <form method="POST" action="{{ route('admin.products-filters.store') }}" enctype="multipart/form-data">
    @csrf
  <div id="content">
    <h1 class="mt-3 pl-4">Thông tin Bộ lọc</h1>
    <div class="save-group-buttons">
        <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
          <i class="material-icons">
            save
          </i>
        </button>
        <a
          class="btn btn-sm btn-dark"
          href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
          target="_blank"
        >
          <i class="material-icons">
            help_outline
          </i>
        </a>
      </div>
      <!-- Form -->
      @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif
      <div class="bg-white p-4 pt-5">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label>Tên bộ lọc</label>
            <input type="text" name="name" class="form-control" placeholder="Tên bộ lọc"/>
            <small class="form-text">Đặt tên cho bộ lọc</small>
          </div>
          <div class="form-group">
            <label>Thuộc tính</label>
            <select
            required
            name="category[]"
            data-selected-text-format="count > 5"
            class="selectpicker form-control category-selectpicker"
            data-count-selected-text="{0} mục đã được chọn"
            data-style="select-with-transition"
            title="Chọn mục sản phẩm"
            data-size="15"
            data-show-tick="true"
            id="products-filters"
            multiple>
              <option value="0"></option>
              @forelse ($categories as $categoryValue)
              <option value="{{ $categoryValue->id }}" {{ isset ($category)&&$categoryValue->id===$category->parent_id?'selected':'' }}>
                  {{ $categoryValue->name }}
              </option>
                 
              @empty
                  
              @endforelse
            </select>
            <small class="form-text">Chọn thuộc tính cho bộ lọc</small>
          </div>
          <!-- Button Toggle -->
          <div class="mb-2">
            <label class="control-label">Trạng thái hiển thị</label>
            <input
              type="checkbox"
              class="checkbox-toggle"
              name="is_public"
              id="public"
              value="1"/>
            <label class="label-checkbox" for="public">Hiển thị</label>
            <small class="form-text">Khi tính năng được bật, thuộc tính sẽ được hiển thị trên bộ lọc.</small>
          </div>
        </div>
        </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('js')

@endpush
