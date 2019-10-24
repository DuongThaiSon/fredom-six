require("../bootstrap");

$(document).ready(function() {
    console.log(ClassicEditor.builtinPlugins.map( plugin => plugin.pluginName ));
    var pageId = $("#page-id").val();
    // Add active class
    $(".menu-" + pageId)
        .parent()
        .addClass("active");
    $(".menu-" + pageId)
        .parents("div")
        .addClass("show");
    $(".menu-" + pageId)
        .parent("li")
        .parents("li")
        .addClass("active");

    // sidebar toggle
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
