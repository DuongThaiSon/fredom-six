import { productCore } from './admin.core';
import { makeTableOrderable, deleteAnItem } from "../core";
import Swal from 'sweetalert2';

$(document).ready(function() {
    let id = $("input[name=id]").val()
    let guide = new productCore(id)
    guide.collectSelectedAttributeId()
    guide.selectCategory()
    // guide.makeVariation()
    // guide.setVariantButtonStatus()
    $(".attribute-selectpicker").selectpicker();

    let productId = $('input[name=id]').val();

    // filePond.initFilePond('gallery-images', `/admin/gallery/${productId}`);
    initBtnDestroyImage()
    $(".upload-variant-image").on("change.uploadVariantImage", function(e) {
        e.preventDefault()
        let formData = new FormData();
        formData.append("uploadImage",$(this)[0].files[0]);
        $.ajax({
            url: `/admin/products/${productId}/process`,
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

    // makeTableOrderable('/admin/products/sort-image');
    // deleteAnItem('/admin/products');
    deleteSingleItem();
});

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
};

let deleteSingleItem = function() {
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        let user_id = $(this).data('user');
        let _this = $(this);
        Swal.fire({
            title: "Bạn chắc chứ?",
            text: `Hành động sẽ xóa vĩnh viễn mục này!`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            cancelButtonClass: "btn",
            confirmButtonText: "Đúng, xóa nó đi",
            cancelButtonText: "Thôi không xóa",
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                Swal.fire({
                    onOpen: () => {
                        Swal.showLoading();
                    }
                });

                let data={
                    user_id: user_id,
                    _method: "DELETE"
                };
                $.ajax({
                    url: _this.attr('data-href'),
                    method: "POST",
                    data: data,
                    success: function(scs) {
                        // $(".image-showcase").html(scs)
                        // initBtnDestroyImage()
                        Swal.fire({
                            title: "Thành công",
                            text: "Bài viết đã được xóa.",
                            type: "success",
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        }).then(function(scs) {
                            location.reload();
                        });
                    }
                })
            }
        });


    });
};
