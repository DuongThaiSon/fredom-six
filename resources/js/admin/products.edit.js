import { productCore } from './admin.core';
import { makeTableOrderable, deleteAnItem } from "../core";
import Swal from 'sweetalert2';

$(document).ready(function() {
    let id = $("input[name=id]").val()
    let guide = new productCore(id)
    guide.selectCategory()
    guide.makeVariation()
    guide.setVariantButtonStatus()
    guide.initDatatablesForVariant()
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

function deleteSingleItem(itemName = "mục") {
    $('#variant-table a.btn-destroy').off('click.deleteSingleItem')
    $('#variant-table a.btn-destroy').on('click.deleteSingleItem', function (e) {
        e.preventDefault();
        const _this = $(this);
        const deleteUrl = $(this).attr("href");
        swalWithDangerConfirmButton.fire({
            title: "Bạn chắc chứ?",
            text: `Hành động sẽ xóa vĩnh viễn ${itemName} này!`,
            icon: "warning",
            confirmButtonText: "Đúng, xóa nó đi",
            cancelButtonText: "Huỷ",
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    onOpen: () => {
                        Swal.showLoading();
                    }
                });
                $.ajax({
                    url: deleteUrl,
                    method: "POST",
                    data: {
                        _method: "DELETE"
                    },
                    success: function () {
                        $('#variant-table').DataTable().draw('page');
                        swalWithSuccessConfirmButton.fire({
                            title: "Thành công",
                            icon: "success"
                        })
                        initCheckboxButton();
                    },
                    error: function (err) {

                        if (err.status === 403) {
                            swalWithDangerConfirmButton.fire({
                                title: "Không được phép!",
                                icon: "error",
                                buttonsStyling: false,
                                html:
                                    "\
                                    <p>Bạn không đủ quyền hạn để thực hiện hành động này.</p>\
                                    <hr>\
                                    <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                            });
                        } else {
                            swalWithDangerConfirmButton.fire({
                                title: "Lỗi",
                                text: `Hãy đảm bảo rằng không còn bài viết và ${itemName} con nào thuộc ${itemName} cần xóa!`,
                                icon: "error",
                                buttonsStyling: false
                            });
                        }
                    }
                });
            }
        });
    });
}
