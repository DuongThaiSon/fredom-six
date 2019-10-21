@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Dashboard')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <div id="content">
      <h1 class="mt-3 pl-4">QUẢN LÝ NỘI DUNG PHỤ</h1>
      <!-- Save group button -->
      <div class="save-group-buttons">
        <a
          href="{{ route('admin.component.create') }}"
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
              <th class="text-center">ID</th>
              <th style="width: 500px;">Tên</th>
              <th style="width: 44.8px;">Hiển thị</th>
              <th>Người đăng</th>
              <th>Ngày tạo</th>
              <th class="text-center">Thao tác</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($components as $comp)
            <tr class="component-body-table">
              <td class="text-center">
                  {{ $comp->id }}
              </td>
              <td>{{ $comp->name }}</td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm p-1 display-client"
                  title="{{ $comp->is_public===1?'click để tắt':'click để bật' }}"
                  data-toggle="tooltip"
                  value="{{ $comp->is_public }}"
                  data-id="{{ $comp->id }}"
                  
                >
                  <i class="material-icons toggle-icon {{ $comp->is_public===1?'text-primary':'' }}">check_circle_outline</i>
                </button>
              </td>
              <td>{{ isset($comp->comCreatedBy)?$comp->comCreatedBy->name:'' }}</td>
              <td>{{ $comp->updated_at }}</td>
              <td class="text-center">
                <a href="{{ route('admin.component.show', $comp->id) }}" data-toggle="tooltip" title="Sửa"
                  ><i class="material-icons">border_color</i></a
                >
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $components->links() }}

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
  <script>
    $(document).ready(function(){
      $('.display-client').click(function(){
        let _id = $(this).parents('.component-body-table').find('.display-client').attr('data-id');
        let _value = $(this).parents('.component-body-table').find('.display-client').attr('value');
        let _this = $(this);
        let _title = $(this).parents('.component-body-table').find('.display-client').attr('title');
        $.ajax({
          url: '/admin/components/public',
          data: {
            id: _id,
            value: _value,
          },
          success: function(data){
            if(_value==0){
              _this.parents('.component-body-table').find('.display-client').attr('value', data.component.is_public);
              _this.parents('.component-body-table').find('.display-client').attr('title', 'Click để tắt');
            }
            else{
              _this.parents('.component-body-table').find('.display-client').attr('value', data.component.is_public);
              _this.parents('.component-body-table').find('.display-client').attr('title', 'click để bật');
            }
          },
          error: function(e){
            console.log(e);
            
          }
        });
      });
      
    });
  </script>
@endpush     
