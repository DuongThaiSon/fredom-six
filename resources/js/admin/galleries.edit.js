// filePond = require("../filepond");
import { makeTableOrderable } from "../core"

$(document).ready(function() {
    // console.log('lleh');
    let galleryId = $('input[name=id]').val();

    // filePond.initFilePond('gallery-images', `/admin/gallery/${galleryId}`);
    initBtnDestroyImage()
    $(".upload-variant-image").on("change.uploadVariantImage", function(e) {
        e.preventDefault()
        let formData = new FormData();
        // formData.append("uploadImage",$(this)[0].files[0]);
        let processImageUrl = $(this).data('href');
        _.forEach($(this)[0].files, function(value) {
            formData.append("uploadImage[]", value);
        })

        $.ajax({
            url: processImageUrl,
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

    let imageReorderUrl = $(".image-showcase").data('href')
    makeTableOrderable(imageReorderUrl)
    updateImageCaptions()
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

function updateImageCaptions() {
    $(".image-caption").off(".updateImageCaptions")
    $(".image-caption").on("keyup.updateImageCaptions paste.updateImageCaptions", _.debounce(function() {
        const caption = $(this).val()
        const updateImageCaptionUrl = $(this).data("href")
        $.ajax({
            url: updateImageCaptionUrl,
            data: {
                caption: caption
            }
        })
    }, 1500))
}
