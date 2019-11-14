@extends('admin.layouts.main', ['activePage' => 'menus-categories', 'title' => __('Menu')])
@section('content')
        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC MENU</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <a href="{{route('admin.menu-categories.create')}}"
                  class="btn btn-sm btn-dark"
                  data-toggle="tooltip"
                  title="Thêm mới"
                >
                  <i class="material-icons">
                    note_add
                  </i>
                </a>
              </div>

              <!-- TABLE -->
              <div class="table-responsive bg-white mt-4" id="table">
                <table class="table-sm table-hover table mb-2" width="100%">
                  <thead>
                    <tr class="text-muted">
                      <th style="width: 34px;">ID</th>
                      <th>TÊN DANH MỤC MENU</th>
                      <th>NGƯỜI ĐĂNG</th>
                      <th>NGÀY TẠO</th>
                      <th style="width: 80px;">THAO TÁC</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $cat)
                          
                     
                    <tr>
                      <td>{{ $cat->id }}</td>
                      <td><a href="{{ route('admin.menus.index', ['id' => $cat->id]) }}">{{ $cat->name }}</a></td>
                      <td>{{ $cat->user->name }}</td>
                      <td>{{ $cat->updated_at }}</td>
                      <td>
                        {{-- <div class="btn-group">
                            <a href="{{route('admin.'.$cat->type.'-categories.create')}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                <i class="material-icons">playlist_add</i> --}}
                            </a>
                            <a href="{{route('admin.'.$cat->type.'-categories.edit', $cat->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            {{-- <a href="{{route('admin.'.$cat->type.'-categories.destroy', $cat->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                <i class="material-icons">delete</i>
                            </a> --}}
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <a
                target="_blank"
                href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                class="float-right mt-4"
              >
                <i class="material-icons">
                  help_outline
                </i>
              </a>
            </div>
          </div>
        </div>
      

@endsection