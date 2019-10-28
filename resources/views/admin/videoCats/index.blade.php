@extends('admin.layouts.main', ['activePage' => 'videos', 'title' => __('Video Category')])
@section('content')
<div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC VIDEO</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <a href="{{ route('admin.video-categories.create') }}" class="btn btn-sm btn-dark">
                  <i class="material-icons">
                    create_new_folder
                  </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ" class="btn btn-sm btn-dark" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
                  <i class="material-icons">
                    delete_forever
                  </i>
                </button>
              </div>

              <!-- TABLE -->
        <div class="card-body">
            <div class="table-responsive bg-white mt-4" id="table">
                @csrf
                <table class="table-sm mb-2" width="100%">
                    <thead class="thead-light">
                        <tr class="text-muted">
                            <th style="width: 30px;"></th>
                            <th style="width: 24px;">
                            <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                <i class="material-icons text-muted">check_box_outline_blank</i>
                            </a>
                            </th>
                            <th>ID</th>
                            <th>TÊN MỤC</th>
                            <th>Mục</th>
                            <th style="width: 120px;">Ngày tạo</th>
                            <th style="width: 120px;">Người đăng</th>
                            <th style="width: 160px;">Thao tác</th>
                        </tr>
                    </thead>
                </table>
            </div>
        @include('admin.partials.categories_rows',['level' => 0])
        </div>
            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc" target="_blank" class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('assets/admin')}}/js/videoCats.js"></script>
@endpush
