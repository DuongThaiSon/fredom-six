@extends('admin.layouts.main', ['activePage' => 'galleriesCat-manage', 'title' => __('Gallery Category')])
@section('content')
 <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC ALBUM ẢNH</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <a href="{{ route('admin.gallery-categories.create') }}" class="btn btn-sm btn-dark">
                  <i class="material-icons">
                    create_new_folder
                  </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn" class="btn btn-sm btn-dark" target="_blank" id="btn-del-all">
                  <i class="material-icons">
                    delete_forever
                  </i>
                </button>
              </div>

              <!-- TABLE -->
              <div class="card-body">
                <div class="table-responsive bg-white mt-4" id="table">
                    <table class="table-sm table-hover table mb-2" width="100%">
                        <thead>
                        <tr class="text-muted">
                            <th style="width:34.5px;"></th>
                            <th style="width:34.4px;">
                            <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                <i class="material-icons text-muted">check_box_outline_blank</i>
                            </a>
                            </th>
                            <th style="width: 40px;">ID</th>
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
            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
            </div>
          </div>
        </div>
  @endsection
  @push('js')
    <script src="{{ asset('assets/admin') }}/js/galleryCats.js"></script>
    <script>
    $(document).ready(function () {
            // core.makeTableOrderable('/admin/products/sort');
            core.initCheckboxButton();
            // core.updateViewViewStatus('/admin/products/update-view-status');
            core.deleteMultipleItems('/admin/gallery-categories/delete-all/');
        });
    </script>
  @endpush
