@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Showroom')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <div id="content">
      <h1 class="mt-3 pl-4">QUẢN LÝ NỘI DUNG PHỤ</h1>
      <!-- Save group button -->
      <div class="save-group-buttons">
        <a
          href="{{ route('admin.showrooms.create') }}"
          class="btn btn-sm btn-dark"
          data-toggle="tooltip"
          title="Thêm mới"
        >
          <i class="material-icons">
            create_new_folder
          </i>
        </a>
      </div>
        @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      <!-- TABLE -->
      <div class="table-responsive bg-white mt-4" id="table">
        <table
          class="table-sm table-hover table mb-2 component-table"
          width="100%"
        >
          <thead>
            <tr class="text-muted">
              <th width="3%" class="text-center">ID</th>
              <th width="15%">Tên</th>
              <th width="15%">Email</th>
              <th width="10%">Số điện thoại</th>
              <th width="32%">Địa chỉ</th>
              <th width="15%">Chi nhánh</th>
              <th width="10%" class="text-center">Thao tác</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($showroom as $show)
            <tr class="showroom-body-table">
              <td class="text-center">
                  {{ $show->id }}
              </td>
              <td>{{ $show->name }}</td>
              <td>{{ $show->email }}</td>
              <td>{{ $show->phone }}</td>
              <td>{{ $show->address }}</td>
              {{-- <td> <img src="/media/images/showrooms/{{ $show->avatar }}" alt=""> </td> --}}
              {{-- <td>
                <button
                  type="button"
                  class="btn btn-sm p-1 display-showroom"
                  title="{{ $show->is_public===1?'click để tắt':'click để bật' }}"
                  data-toggle="tooltip"
                  value="{{ $show->is_public }}"
                  data-id="{{ $show->id }}">
                  <i class="material-icons toggle-icon {{ $show->is_public===1?'text-primary':'' }}">check_circle_outline</i>
                </button>
              </td> --}}
              {{-- <td>{{ isset($show->showroomCreatedBy)?$show->showroomCreatedBy->name:'' }}</td> --}}
              <td>{{ $show->regions }}</td>
              <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('admin.showrooms.edit', $show->id) }}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                        title="Sửa">
                        <i class="material-icons">border_color</i>
                    </a>                                   
                    <form style="margin-top: 0 !important; padding-top: 0 !important;" action="{{route('admin.showrooms.destroy', $show->id)}}" method="POST" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                        <button class="btn btn-sm btn-sm p-1" data-toggle="tooltip" title="Xoá" type="submit">
                            <i class="material-icons">delete</i>
                        </button>
                    </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $showroom->links() }}

      <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc" target="_blank" class="float-right mt-4">
        <i class="material-icons">
          help_outline
        </i>
      </a>
    </div>
  </div>
</div>
@endsection

