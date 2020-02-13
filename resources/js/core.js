"use strict";
import Swal from "sweetalert2";

export const swalWithSuccessConfirmButton = Swal.mixin({
    customClass: {
        confirmButton: 'rounded btn btn-success',
        cancelButton: 'rounded btn btn-secondary ml-2',
    },
    buttonsStyling: false
})
export const swalWithDangerConfirmButton = Swal.mixin({
    customClass: {
        confirmButton: 'rounded btn btn-danger',
        cancelButton: 'rounded btn btn-secondary ml-2',
    },
    buttonsStyling: false
})

const croppieOptions = {
    enableExif: true,
    viewport: {
        width: 300,
        height: 300,
        type: 'square'
    },
    boundary: {
        width: 350,
        height: 350
    }
}

/**
 * Init behavior button
 */
export function initCheckboxButton() {
    // Button check/unchecked all
    $(".btn-check-all").off(".checkAll");
    $(".btn-check-all").on("click.checkAll", renderButtonCheckAll);

    // Behavior check input
    $(".form-check-input").change(function () {


        // If check a button and its category has sub
        // Let's check all its subs
        if ($(this).prop("checked") == true) {
            // Check its sub
            let checkBoxes = $(this)
                .parents("table")
                .parent()
                .parent()
                .find("ul .form-check-input");
            checkBoxes.prop("checked", true);
        }

        // If unchecked a button and all buttons at same level are unchecked
        // Let's unchecked its parent
        if ($(this).prop("checked") == false) {
            let checkLevel = $(this).attr("data-level");
            let parent = $(this)
                .parent()
                .closest("ul")
                .parent()
                .find(".form-check-input")
                .first();
            let checkBoxes = $(this)
                .parent()
                .closest("ul")
                .find(
                    ".form-check-input[data-level=" +
                    checkLevel +
                    "]:checkbox:checked"
                );
            if (checkBoxes.length == 0) {
                parent.prop("checked", false);
            }
        }

        // Change appear button check all
        changeAppearButtonCheckAll();
    });
}

// Change appear button check all
function changeAppearButtonCheckAll() {
    if (
        $("input.form-check-input:checkbox:checked").length ===
        $("input.form-check-input:checkbox").length
    ) {
        $(".btn-check-all").prop("indeterminate", false);
        $(".btn-check-all").prop("checked", true);
    } else if ($("input.form-check-input:checkbox:checked").length > 0) {
        $(".btn-check-all").prop("checked", false);
        $(".btn-check-all").prop("indeterminate", true);
    } else {
        $(".btn-check-all").prop("checked", false);
        $(".btn-check-all").prop("indeterminate", false);
    }
}

function renderButtonCheckAll() {
    let checkBoxes = $(".form-check-input");
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));

    changeAppearButtonCheckAll();
}

/**
 * Click remove an item
 *
 * @param deleteUrl string
 */
export function deleteAnItem(deleteUrl, itemName = "mục") {
    $(".delete-category").click(function (e) {
        e.preventDefault();

        let _this = $(this);
        let delete_id = $(this).attr("data-id");

        swalWithDangerConfirmButton.fire({
            title: "Bạn chắc chứ?",
            text: `Hành động sẽ xóa vĩnh viễn ${itemName} này!`,
            icon: "warning",
            confirmButtonText: "Đúng, xóa nó đi",
            cancelButtonText: "Huỷ",
            buttonsStyling: false
        })
            .then(function (result) {
                if (result.value) {
                    Swal.fire({
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    $.ajax({
                        url: deleteUrl + "/" + delete_id,
                        method: "POST",
                        data: {
                            _method: "DELETE"
                        },
                        success: function () {
                            _this.closest("li").remove();
                            swalWithSuccessConfirmButton.fire({
                                title: "Thành công",
                                text: "Bài viết đã được xóa.",
                                icon: "success",
                                buttonsStyling: false
                            }).then(function () {
                                location.reload();
                            });
                            changeAppearButtonCheckAll();
                        },
                        error: function (err) {
                            if (err.status === 403) {
                                swalWithDangerConfirmButton.fire({
                                    title: "Không được phép!",
                                    icon: "error",
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
                                });
                            }
                        }
                    });
                }
            });
    });
}

/**
 * Click remove selected items
 *
 * @param string deleteUrl
 * @param string itemName
 */
export function deleteMultipleItems(deleteUrl, itemName = "mục") {
    $("#btn-del-all").click(function () {
        var checkedCounter = $("input.form-check-input:checkbox:checked").length;
        if (checkedCounter > 0) {
            swalWithDangerConfirmButton.fire({
                title: "Bạn chắc chứ?",
                text: `Hành động sẽ xóa vĩnh viễn những ${itemName} đã chọn!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Đúng, xóa hết đi",
                cancelButtonText: "Huỷ",
            })
                .then(function (result) {
                    if (result.value) {
                        let delete_id = "";
                        $("input.form-check-input:checkbox:checked").each(
                            function (index) {
                                delete_id += $(this).attr("data-id") + ",";
                            }
                        );

                        delete_id = delete_id.slice(0, delete_id.length - 1);
                        Swal.fire({
                            onOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: deleteUrl,
                            method: "POST",
                            data: {
                                ids: delete_id,
                                _method: "DELETE"
                            },
                            success: function () {
                                swalWithSuccessConfirmButton.fire({
                                    title: "Thành công",
                                    text: `Đã xóa các ${itemName} được chọn.`,
                                    icon: "success"
                                }).then(function () {
                                    location.reload();
                                });
                                changeAppearButtonCheckAll();
                            },
                            error: function (err) {
                                if (err.status === 403) {
                                    swalWithDangerConfirmButton.fire({
                                        title: "Không được phép!",
                                        icon: "error",
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
                                    });
                                }
                            }
                        });
                    }
                })
                ;
        } else {
            swalWithDangerConfirmButton.fire({
                title: "Err...",
                text: `Chưa chọn ${itemName} nào cả.`,
            });
        }
    });
}

export function makeTableOrderable(orderUrl, orderContainer = ".sort") {
    $(orderContainer).sortable({
        handle: ".connect",
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
        update: function (event, ui) {
            let sort = $(this).sortable("toArray");
            $.ajax({
                url: orderUrl,
                method: "POST",
                data: {
                    sort: sort
                },
                error: function (err) {
                    if (err.status === 403) {
                        swalWithDangerConfirmButton.fire({
                            title: "Lỗi!",
                            icon: "error",
                            html:
                                "\
                                <p>Bạn không đủ quyền hạn để thực hiện hành động này. Mọi thay đổi sẽ không được lưu lại.</p>\
                                <hr>\
                                <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                        });
                    }
                }
            });
        }
    });
}

export function updateViewViewStatus(updateUrl) {
    $(".btn-update-view-status").off(".updateViewStatus");
    $(".btn-update-view-status").on("click.updateViewStatus", _.throttle(function (e) {
        e.preventDefault()
        Swal.showLoading();
        let context = $(this);
        let data = {
            value: $(this).prop("checked") ? '0' : '1',
            id: $(this).data("id"),
            field: $(this).prop("name"),
        }

        $.ajax({
            url: updateUrl,
            method: "POST",
            data: data,
            success: function (scs) {
                if (scs.value) {
                    context.attr('title', "Click để tắt");
                    context.prop("checked", true)
                } else {
                    context.attr('title', "Click để bật");
                    context.prop("checked", false)
                }
                Swal.close()
                return;
            },
            error: function (err) {
                Swal.close()
            }
        })
    }, 500));
}

export function deleteSingleItem(itemName = "mục") {
    $(".btn-destroy").off("click.deleteSingleItem");
    $(".btn-destroy").on("click.deleteSingleItem", function (e) {
        e.preventDefault();
        let _this = $(this);
        let deleteUrl = $(this).attr("href");

        swalWithDangerConfirmButton.fire({
            title: "Bạn chắc chứ?",
            text: `Hành động sẽ xóa vĩnh viễn ${itemName} này!`,
            icon: "warning",
            confirmButtonText: "Đúng, xóa nó đi",
            cancelButtonText: "Huỷ",
            buttonsStyling: false
        })
            .then(function (result) {
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
                            _this.closest("li").remove();
                            swalWithSuccessConfirmButton.fire({
                                title: "Thành công",
                                icon: "success"
                            }).then(function () {
                                location.reload();
                            });
                            changeAppearButtonCheckAll();
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

export function moveTop() {
    $(".btn-move-top").off(".moveTop");
    $(".btn-move-top").on("click.moveTop", _.throttle(function (e) {
        e.preventDefault();
        let moveTopUrl = $(this).attr("href");

        $.ajax({
            url: moveTopUrl,
            method: "POST",
            success: function() {
                location.reload()
            },
            error: function(reject) {
                console.log(reject);
            }
        })
    }, 500))
}

export function initUploadAvatarZone() {
    $("#imageUpload").off("click.initUploadAvatarZone")
    $("#imageUpload").on("click.initUploadAvatarZone", function (e) {
        e.preventDefault()
        $('.upload-avatar-modal').modal('show')
        const croppieImage = $('#croppie-zone').croppie(croppieOptions);
        $('.upload-avatar-modal').on('shown.bs.modal', function () {
            appendCroppieImage(croppieImage)
        });
        $('.upload-avatar-modal').on('hidden.bs.modal', function (e) {
            croppieImage.croppie('destroy')
            $("#croppie-select-image-area").removeClass('d-none')
            $("#croppie-edit-image").addClass("d-none")
        })
    })
}

function appendCroppieImage(croppieImage) {
    $("#croppie-select-image-area").off(".appendCroppieImage")
    $("#croppie-select-image-area").on("click.appendCroppieImage", function (e) {
        e.preventDefault()
        $("input#croppie-select-image").trigger("click")
        $("input#croppie-select-image").on("change.appendCroppieImage", function () {
            readFileInput(this).then(result => {
                $("#croppie-select-image-area").addClass('d-none')
                $("#croppie-edit-image").removeClass("d-none")
                croppieImage.croppie('bind', {
                    url: result
                });
                initSaveCropAction(croppieImage)
            })
        })
    })
}

function readFileInput(input) {
    return new Promise((resolve, reject) => {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                resolve(e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            reject('Invalid')
        }
    })
}

function initSaveCropAction(croppieImage) {
    $(".btn-croppie-save-image").off(".initSaveCropAction")
    $(".btn-croppie-save-image").on("click.initSaveCropAction", function (e) {
        e.preventDefault()
        croppieImage.croppie('result', 'base64').then(function (image) {
            $("#imagePreview").css('background-image', `url(${image})`);
            $("input[name=avatar]").val(image)
            $('.upload-avatar-modal').modal('hide')
        })
    })
    $(".btn-croppie-cancel").off(".initSaveCropAction")
    $(".btn-croppie-cancel").on("click.initSaveCropAction", function (e) {
        e.preventDefault()
        $("#croppie-select-image-area").removeClass('d-none')
        $("#croppie-edit-image").addClass("d-none")
    })
}
