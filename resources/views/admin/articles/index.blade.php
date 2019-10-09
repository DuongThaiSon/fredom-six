@extends('admin.layouts.main', ['activePage' => 'article', 'title' => __('List Articles')])
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
              <h1 class="mt-3 pl-4">Tin bài</h1>
              <!-- Save group button -->
              <div class="save-group-buttons">
                <a href="{{route('admin.articles.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Thêm bài viết mới">
                  <i class="material-icons">
                    note_add
                  </i>
                </a>
                <button 
                  data-toggle="tooltip" title="Xóa toàn bộ mục được chọn"
                  class="btn btn-sm btn-dark"
                  target="_blank"
                  id="btn-del-all"
                >
                  <i class="material-icons">
                    delete_forever
                  </i>
                </button>
              </div>

              <!-- TABLE -->
        <div class="table-responsive bg-white mt-4" id="table">
        @csrf
          <table class="table-sm table-hover table mb-2" width="100%">
            <thead>
              <tr class="text-muted">
                <th></th>
                <th class="text-center">
                  <a
                  id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ"
                  >
                    <i class="material-icons text-muted">check_box_outline_blank</i>
                  </a>
                </th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Mục</th>
                <th style="width: 40px;">Hiển thị</th>
                <th style="width: 40px;">Nổi bật</th>
                <th style="width: 40px;">Mới</th>
                <th style="width: 120px;">Ngày tạo</th>
                <th style="width: 120px;">Người đăng</th>
                <th style="width: 160px;">Thao tác</th>
              </tr>
            </thead>
            <tbody class="sort">
                @foreach ($articles as $article )    
                <tr id="item_{{$article->id}}" class="ui-state-default">
                  <td class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                    <i class="material-icons">format_line_spacing</i>
                  </td>
                  <td class="text-center">
                    <input type="checkbox" class="checkdel" del-id="{{$article->id}}" />
                  </td>
                  <td>{{$article->id}}</td>
                  <td class="editname">
                    <a href="{{route('admin.articles.edit', $article->id)}}">{{$article->name}}</a>
                  </td>
                  <td>
                    <a href="{{route('admin.articleCats.edit', $article->category_id)}}">{{$article->category()->first()->name??''}}</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" title="Click để tắt">
                      <i class="material-icons toggle-icon">check_circle_outline</i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" title="Click để bật">
                      <i class="material-icons toggle-icon">highlight_off</i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" title="Click để bật">
                      <i class="material-icons toggle-icon">highlight_off</i>
                    </button>
                  </td>
                  <td>{{$article->created_at}}</td>
                  <td>{{$article->user()->first()->name}}</td>
                  <td>
                    <div class="btn-group">
                     
                      <a href="#" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip" title="Sửa">
                        <i class="material-icons">border_color</i>
                      </a>
                      <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Copy dữ liệu">
                        <i class="material-icons">file_copy</i>
                      </a>
                      <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Đưa lên đầu tiên">
                        <i class="material-icons">call_made</i>
                      </a>
                     {{-- <form action="{{route('admin.articles.destroy', $article->id)}}" method="POST">              
                       @csrf
                      @method('DELETE') --}}
                      <button class="btn btn-sm p-1 delete-button" delete-id="{{$article->id}}" data-toggle="tooltip" title="Xoá">
                        <i class="material-icons">delete</i>
                      </button>
                          {{-- </form> --}}
                    </div>
                  </td>
                </tr>
            
                @endforeach
            </tbody>
          </table>
          {{ $articles->links() }}
          
        </div>
          <!-- Pagination -->
          {{-- <ul class="pagination float-left mt-4">
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
            </ul> --}}

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
          url: '/admin/articles/sort',
          data: {
            sort: sort
          },
          success: function(){
            alert('SORTED');
          }      
        });
     }
   }
   
    $( ".sort" ).sortable(sortableOptions);
     $('.delete-button').click(function(e){
			e.preventDefault();
			if (confirm('Bạn có chắc chắn muốn xóa?')){
                var delete_id = $(this).attr('delete-id');
				$.ajax({
					url: '/admin/articles/' + delete_id,
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