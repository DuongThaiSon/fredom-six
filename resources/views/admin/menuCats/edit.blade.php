@extends('admin.layouts.main', ['activePage' => 'menus-categories', 'title' => __('Menu Categories Edit')])
@section('content')

        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
            <form action="{{ route('admin.menu-categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data" class="bg-white mb-0 p-4 pt-5">
                @csrf
                @method('PUT')
                {{-- @if ($errors->any())
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel">
                        <use xlink:href="#stroked-cancel"></use>
                    </svg>{{ $errors->first() }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
               @endif --}}
              <h1 class="mt-3 pl-4">THÔNG TIN DANH MỤC MENU</h1>
              <div class="save-group-buttons">
                  <button name="submit" class="btn btn-sm btn-dark">
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
              
                
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="control-label">Tên danh mục menu</label>
                      <input type="text" id="name" name="name" value="{{ $categories->name }}"class="form-control" placeholder="Tên danh mục" required />
                      <small class="form-text"
                        >Đặt tên cho danh mục menu</small
                      >
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection     