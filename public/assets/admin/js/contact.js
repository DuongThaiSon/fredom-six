
$("#menu-contact").addClass("show");

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
  $(".deleteAll-contact").click(function(e) {
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
        var ids = [];
        $(".checkdel:checked").each(function(){
          ids.push($(this).val());
        });
        
        console.log(ids);
      if (result.value) {
        $.ajax({
          url: "contact/delete",
          type: "post",
          data: {
            _method: "delete",
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
    $(".btn-delete").click(function(e) {
      e.preventDefault();
      var _id = $(this).attr('data-id');
      
      Swal.fire({
        position: 'top-end',
        type: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => { 
        console.log(_id);
        $.ajax({
          url: "contact/delete",
          data: { id : _id }
        }).then((result) => { location.reload() });
      });
    })
