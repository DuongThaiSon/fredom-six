$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// Toggle Icon
$(document).ready(function() {
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
   $(".has-child").hover(function() {
    $("#page-content").toggleClass("index");
   });
   $(this).toggleClass("active");
   if ($(this).hasClass("active")) {
    $(".collapse").removeClass("show");
   }
   $(".sub").toggleClass("collapse");
   $(".nav-link.collapsed").attr("data-toggle", function(i, attr) {
    return attr == "collapse" ? "false" : "collapse";
   });
  });
 });

 //  Sortable
 $(".sort").sortable({
  handle: ".connect"
 });

 // Login input
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

 // Date Picker
 $(".datepicker").datepicker({ showButtonPanel: true, dateFormat: "yy-mm-dd" });
});
