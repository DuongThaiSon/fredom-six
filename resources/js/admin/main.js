require("../bootstrap");

$(document).ready(function() {
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

    // read filename on custom input file
    $('.custom-file-input').change(function() {
        let fileName = readUploadFileName(this);
        $(this).parents(".custom-file").find(".custom-file-label").text(fileName);
    })

    // format input price
    $(".price-format").simpleMoneyFormat();

    // format datetime picker
    $(".date-picker").flatpickr({});
});

function readUploadFileName(input) {
    if (input.files && input.files[0]) {
        return _.truncate(input.files[0].name, {
            'length': 38,
        });
    }
}
