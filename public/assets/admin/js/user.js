
$(document).ready(function() {
 $("#menu-admin-user").addClass("show");
     $(".toggle-icon").click(function() {
       if ($(this).text() == "check_circle_outline") {
         $(this)
           .text("highlight_off")
           .removeClass("text-primary");
       } else {
         $(this)
           .text("check_circle_outline")
           .addClass("text-primary");
       }
     });


     $(".delete-all-user").click(function(e) {
     e.preventDefault();
     let _id = $(".checkdel:checked").length;
     
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
           url: "deleteAll",
           type: "post",
           data: {
             _method: "delete",
             ids: ids
           },
           success: function(){
            Swal.fire(
              'Đã xóa!',
              'Dữ liệu xóa thành công.',
              'success'
              ).then((result)=>{
                location.reload();
              });
           }
         });
         
           // .then((result)=>{$("#delete-all").submit();});
         }
       })
     }
     });


     $(".btn-delete-user").click(function(e) {
       e.preventDefault();
       let _id = $(this).attr('data-id');
       $.ajax({
         url: "delete",
         type: "post",
         data: {
           _method: "delete", 
           id : _id 
         },
         success: function(){
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Dữ liệu xóa thành công',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => { 
             location.reload();
          });
         }
       });
       
     });
});