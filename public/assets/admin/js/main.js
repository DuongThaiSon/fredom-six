$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  // Sort table
  $(function() {
    $(".sort").sortable();
    $(".sort").disableSelection();
  });

  // Sidebar toggle
  $(document).ready(function() {
    $("#sidebarCollapse").on("click", function() {
      $("#sidebar").toggleClass("active");
      $("#page-content").toggleClass("active");
      $(this).toggleClass("active");
    });
  });

  $(".toggle-password").click(function() {
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  $(".delete-email").click(function() {
    $("#email-field").val("");
  });

  //Check all button
  $("#btn-ck-all").click(function() {
    var checkBoxes = $(".checkdel");
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    if (
      $("input.checkdel:checkbox:checked").length ==
      $("input.checkdel:checkbox").length
    ) {
      $("#btn-ck-all i").text("check_box");
    } else if ($("input.checkdel:checkbox:checked").length > 0) {
      $("#btn-ck-all i").text("indeterminate_check_box");
    } else {
      $("#btn-ck-all i").text("check_box_outline_blank");
    }
  });

  $(".checkdel").change(function() {
    if (
      $("input.checkdel:checkbox:checked").length ==
      $("input.checkdel:checkbox").length
    ) {
      $("#btn-ck-all i").text("check_box");
    } else if ($("input.checkdel:checkbox:checked").length > 0) {
      $("#btn-ck-all i").text("indeterminate_check_box");
    } else {
      $("#btn-ck-all i").text("check_box_outline_blank");
    }
  });
});
