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
          url: '/admin/article-categories/sortcat',
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
    /**delete All */
    $(".delete-all").click(function(e) {
        e.preventDefault();
        let _id = $(".checkdel:checked").length;
        console.log(_id);
        if (_id < 1) {
          Swal.fire({
              type: 'error',
            title: 'Lỗi...',
            text: 'Không có dữ liệu để xóa!'
        });
        }else {
            Swal.fire({
          title: 'Bạn chắc chứ ?',
          text: "Hành động sẽ xóa vĩnh viễn những dữ liệu đã chọn!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Thôi, đùa đấy!',
          confirmButtonText: 'Đúng, xóa nó đi!',
        }).then((result) => {
            let ids = [];
            $(".checkdel:checked").each(function(){
                ids.push($(this).val());
            });

            console.log(ids);
          if (result.value) {
            $.ajax({
                url: "/admin/article-categories/delete",
              type: "POST",
              data: {
                _method: "DELETE",
                ids: ids
              }
            });
            Swal.fire(
              'Đã xóa!',
              'Dữ liệu xóa thành công.',
              'success'
              ).then((result)=>{
                  location.reload();
              });
              // .then((result)=>{$("#delete-all").submit();});
            }
          })
        }
    });
  });
