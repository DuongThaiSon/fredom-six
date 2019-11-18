// filePond = require("../filepond");

$(document).ready(function() {
    // console.log('lleh');
    let galleryId = $('input[name=id]').val();

    // filePond.initFilePond('gallery-images', `/admin/gallery/${galleryId}`);
    initBtnDestroyImage()
    $(".upload-variant-image").on("change.uploadVariantImage", function(e) {
        e.preventDefault()
        let formData = new FormData();
        formData.append("uploadImage",$(this)[0].files[0]);
        $.ajax({
            url: `/admin/galleries/${galleryId}/process`,
            data: formData,
            method: "POST",
            contentType: false,
            processData: false,
            success: function(scs) {
                $(".image-showcase").html(scs)
                initBtnDestroyImage()
            }
        })
    })
})

function initBtnDestroyImage() {
    $(".btn-destroy-image").off("click.initBtnDestroyImage")
    $(".btn-destroy-image").on("click.initBtnDestroyImage", function(e) {
        e.preventDefault()
        $.ajax({
            url: $(this).attr('data-href'),
            method: "POST",
            data: {
                _method: 'DELETE'
            },
            success: function(scs) {
                $(".image-showcase").html(scs)
                initBtnDestroyImage()
            }
        })
    })
}
