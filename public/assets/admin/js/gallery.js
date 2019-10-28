$(document).ready(function () {
    /**sort**/
    let sortableOptions = {
        handle: ".connect",
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
        update: function () {
            let sort = $(this).sortable("toArray");
            console.log(sort);
            $.ajax({
                method: 'POST',
                url: '/admin/gallery/sort',
                data: {
                    sort: sort
                },
                success: function () {
                    alert('SORTED');
                }
            });
        }
    }
    $(".sort").sortable(sortableOptions);
    /**Button public**/
    $(".click-public").click(function() {
       let value = $(this).parents(".ui-state-default").find(".click-public").attr("value");
       let id = $(this).parents(".ui-state-default").find(".click-public").attr("curentid");
        $.ajax({
            method: 'POST',
            url: '/admin/gallery/change-is-public',
            data: {
            value : value,
            id : id
            },
            success: function(data){

            },
        });
    });
            /**Button highlight**/
    $(".click-highlight").click(function() {
            let value = $(this).parents(".ui-state-default").find(".click-highlight").attr("value");
            let id = $(this).parents(".ui-state-default").find(".click-highlight").attr("curentid");
        $.ajax({
            method: 'POST',
            url: '/admin/gallery/change-is-highlight',
            data: {
            value : value,
            id : id
            },
            success: function(data){

            },
        });
    });
            /**Button new**/
    $(".click-new").click(function() {
            let value = $(this).parents(".ui-state-default").find(".click-new").attr("value");
            let id = $(this).parents(".ui-state-default").find(".click-new").attr("curentid");
        $.ajax({
            method: 'POST',
            url: '/admin/gallery/change-is-new',
            data: {
            value : value,
            id : id
            },
            success: function(data){

            },
        });
    });
    /**Move Top**/
    $('.move-top-button').click(function(e){
        e.preventDefault();
        // $("[data-toggle=tooltip]").tooltip('hide');
        var gallery_id = $(this).attr('gallery-id');
        // $('#cat_table').html(showloading());
        console.log(gallery_id);
        $.ajax({
            url: '/admin/gallery/movetop/' + gallery_id,
            async: true,
            success: function(data) {
                    alert("Reload Page, Please!!");
                    location.reload();
            }
        });
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
                url: "/admin/gallery/delete",
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
