<div class="table-responsive bg-white mt-4" id="table">
  @csrf
    <table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">
      <thead>
        <tr class="text-muted">
            <th>ID</th>
            <th>TÊN BÀI VIẾT</th>
            <th>TÊN MỤC</th>
            <th>THAO TÁC</th>
        </tr>
      </thead>
      <tbody>
            @forelse ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td class="choose-record" data-id="{{ $article->id }}">{{ $article->name }}</td>
            <th>{{ $article->category->name }}</th>
          <td>
            <div class="btn-group">
                <a class="btn-sm btn-success choose-record" href="#"  data-id="{{ $article->id }}" class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug="{{ $article->slug }}" data-type="article">
                    <i class="material-icons">radio_button_checked</i>Chọn  
                </a>
            </div>
          </td>
        </tr>
        @empty
            <div class="alert alert-danger">Không có mục nào được chọn</div>
        @endforelse
      </tbody>
    </table>
    {{ $articles->links() }}
</div>
<script>
    $(document).ready(function(e){
      $('.choose-record').on('click', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let slug = $(this).attr('data-slug');
        $('input[name=link]').val(slug);
        
        $.ajax({
          url: '/admin/menus/get-article/'+id,
          method: 'get',
          data: {},
          success: function(scs){
           resData = scs.article;
           $('#table').remove();
           var html = `<div class="table-responsive bg-white mt-4" id="table"><table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">`;
              html+= `<thead><tr class="text-muted"><th>ID</th><th>TÊN BÀI VIẾT</th><th>TÊN MỤC</th></tr></thead>`;
              html+= ` <tbody><tr><td>`+ resData.id + `</td>
                    <td><a target="_blank" href="/admin/articles/`+ resData.id +`/edit">`+ resData.name +`</a></td>
                    <th>`+ resData +`</th></tr></tbody></table>
                    <button class="btn btn-sm btn-info button-choose-article">Chọn bài viết khác</button></div>`;
            $('.filter-result').append(html);
            $('.button-choose-article').click(function(e) {
              e.preventDefault();
              $.ajax({
              url: '/admin/menus/list-articles',
              method: 'GET',
              success: function(scs){
                $('#table').remove();
                $('.filter-result').html(scs)
              },
              error: function(e){
                console.log(e);
          
                  }
              });
            })
          },
          error: function(e){
          console.log(e);
          }
        })
      });
    });
  </script>