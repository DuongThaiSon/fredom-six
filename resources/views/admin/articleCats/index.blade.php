@extends('admin.layouts.main', ['activePage' => 'articleCats', 'title' => __('Articles Category')])
@section('content')
        <div id="main-content">
          <!-- Search Group Button -->
          <div class="search-button-group">
              <div class="row collapse" id="advancesearch">
                    <div class="form-row">
                      <div class="form-group col">
                        <label>Mục</label>
                        <select class="form-control search-change p-2">
                          <option></option>
                          <option>BẾP ĐIỆN TỪ</option>
                        </select>
                      </div>

                      <div class="form-group col">
                        <label>Người tạo</label>
                        <select class="form-control search-change p-2">
                          <option></option>
                          <option>Admin</option>
                        </select>
                      </div>

                      <div class="form-group col">
                        <label>Từ ngày</label>
                        <input
                          id="to_date"
                          type="text"
                          class="form-control datepicker search-change p-2"
                        />
                      </div>

                      <div class="form-group col">
                        <label>Đến ngày</label>
                        <input
                          id="from_date"
                          type="text"
                          class="form-control datepicker search-change p-2"
                        />
                      </div>
                    </div>
                </div>
            </div>
          <!-- End Search Group Button -->
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <a href="{{route('admin.article-categories.create')}}" class="btn btn-sm btn-dark">
                  <i class="material-icons"> note_add</i>
                </a>
                <button id="btn-del-all" data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn" class="btn btn-sm btn-dark delete-all" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
                  <i class="material-icons">delete_forever</i>
                </button>
              </div>
              <!-- TABLE -->
              <div class="card-body">
                    <div class="table-responsive bg-white mt-4" id="table">
                        <table class="table-sm table-hover mb-2" width="100%">
                            <thead>
                                <tr class="text-muted">
                                  {{-- <th></th> --}}
                                  <th width="3%" class="text-center">
                                    <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                        <i class="material-icons text-muted">check_box_outline_blank</i>
                                    </a>
                                  </th>
                                  <th width="4%">ID</th>
                                  <th width="25%">TÊN MỤC</th>
                                  <th width="20%">Mục</th>
                                  <th width="20%">Ngày tạo</th>
                                  <th width="15%">Người đăng</th>
                                  <th width="13%">Thao tác</th>
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
    <script src="{{ asset('assets/admin') }}/js/articleCats.js"></script>
    <script>
        $(document).ready(function () {
            // core.makeTableOrderable('/admin/products/sort');
            core.initCheckboxButton();
            // core.updateViewViewStatus('/admin/products/update-view-status');
            core.deleteMultipleItems('/admin/article-categories/delete-all/');
        });
    </script>
@endpush
