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
                <a href="{{route('admin.article-cats.create')}}" class="btn btn-sm btn-dark">
                  <i class="material-icons"> note_add</i>
                </a>
                <button id="btn-del-all" data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn" class="btn btn-sm btn-dark" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
                  <i class="material-icons">delete_forever</i>
                </button>
              </div>
              <!-- TABLE -->
              <div class="table-responsive bg-white mt-4" id="table">
              @csrf
                <table class="table-sm table-hover table mb-2" width="100%">
                  <thead>
                    <tr class="text-muted">
                      <th style="width: 34.5px;"></th>
                      <th style="width: 34.5px;" class="text-center">
                        <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                          <i class="material-icons text-muted">check_box_outline_blank</i>
                        </a>
                      </th>
                      <th style="width: 40px;">ID</th>
                      <th>TÊN MỤC</th>
                      <th style="width: 120px;">Ngày tạo</th>
                      <th style="width: 120px;">Người đăng</th>
                      <th style="width: 160px;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody class="sort sortcat">
                  @foreach ($categories as $category)
                      <tr id="cat_{{$category->id}}" class="ui-state-default">
                        <td class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                          <i class="material-icons">format_line_spacing</i>
                        </td>
                        <td class="text-center">
                          <input type="checkbox" class="checkdel" value="{{$category->id}}" />
                        </td>
                        <td>{{$category->id}}</td>
                        <td>
                          <a href="{{route('admin.article-cats.edit', $category->id)}}">{{$category->name}}</a>
                        </td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->user()->first()->name}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{route('admin.article-cats.edit', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa">
                              <i class="material-icons">border_color</i>
                            </a>
                            <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Copy dữ liệu">
                              <i class="material-icons">file_copy</i>
                            </a>
                            <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Đưa lên đầu tiên">
                              <i class="material-icons">call_made</i>
                            </a>
                              {{-- @method('DELETE') --}}
                            <button class="btn btn-sm p-1 delete-button" delete-id="{{$category->id}}" data-toggle="tooltip" title="Xoá">
                              <i class="material-icons">delete</i>
                            </button>
                          </div>
                        </td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
                {{-- {{$categories->links()}} --}}
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
   let sortableOptions = {
     handle: ".connect",
     placeholder: "ui-state-highlight",
     forcePlaceholderSize: true,
     update: function() {
       let sort = $(this).sortable("toArray");
       console.log(sort);
       $.ajax({
          method: 'POST',
          url: '/admin/articleCats/sortcat',
          data: {
            sort: sort
          },
          success: function(){
            alert('SORTED');
          }
        });
     }
   }
    $( ".sortcat" ).sortable(sortableOptions);
    $('.delete-button').click(function(e){
			e.preventDefault();
			if (confirm('Bạn có chắc chắn muốn xóa?')){
                var delete_id = $(this).attr('delete-id');
				$.ajax({
					url: '/admin/articleCats/' + delete_id,
					async: true,
					method: 'DELETE',
					success: function(){
					alert('DELETED');
					}
				});
			}
		});
  });
</script>
@endpush
