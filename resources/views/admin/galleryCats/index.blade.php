@extends('admin.layouts.main', ['activePage' => 'GalleryCats', 'title' => __('Gallery Category')])
@section('content')
 <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC ALBUM ẢNH</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <button class="btn btn-sm btn-dark">
                  <i class="material-icons">
                    create_new_folder
                  </i>
                </button>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn" class="btn btn-sm btn-dark" target="_blank">
                  <i class="material-icons">
                    delete_forever
                  </i>
                </button>
              </div>

              <!-- TABLE -->
      <div class="table-responsive bg-white mt-4" id="table">
          <table class="table-sm table-hover table mb-2" width="100%">
            <thead>
              <tr class="text-muted">
                <th style="width:24.4px;"></th>
                <th style="width:34.4px;">
                  <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                    <i class="material-icons text-muted">check_box_outline_blank</i>
                  </a>
                </th>
                <th>ID</th>
                <th>TÊN MỤC</th>
                <th style="width: 120px;">Ngày tạo</th>
                <th style="width: 120px;">Người đăng</th>
                <th style="width: 160px;">Thao tác</th>
              </tr>
            </thead>
            <tbody class="sort">
            @foreach ($categories as $category )
              <tr>
                <td class="text-muted" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                  <i class="material-icons">format_line_spacing</i>
                </td>
                <td class="text-center">
                  <input type="checkbox" class="checkdel" />
                </td>
                <td>{{$category->id}}</td>
                <td>
                  <a href="#">{{$category->name}}</a>
                </td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->user()->first()->name}}</td>
                <td>
                  <div class="btn-group">
                    <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                      <i class="material-icons">playlist_add</i>
                    </a>
                    <a href="{{route('admin.gallery-cats.edit', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa">
                      <i class="material-icons">mode_edit</i>
                    </a>
                    <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Xóa">
                      <i class="material-icons">delete</i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>


        </div>
          <!-- Pagination -->
          <ul class="pagination float-left mt-4">
              <li class="page-item">
                <a class="page-link" style="padding-top:4px;">
                  <i class="material-icons">
                    chevron_left
                  </i>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link">2</a>
              </li>
              <li class="page-item">
                <a class="page-link">...</a>
              </li>
              <li class="page-item">
                <a class="page-link">4</a>
              </li>
              <li class="page-item">
                  <a class="page-link" style="padding-top:4px;">
                      <i class="material-icons">
                        chevron_right
                      </i>
                    </a>
              </li>
            </ul>

            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
            </div>
          </div>
        </div>
  @endsection
