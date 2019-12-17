"use strict";

/**
 * Init behavior button
 */

export function initCheckboxButton() {
    // Button check/uncheck all
    $("#btn-ck-all").off(".checkAll");
    $("#btn-ck-all").on("click.checkAll", renderButtonCheckAll);

    // Behavior check input
    $(".form-check-input").change(function() {
        // Change appear button check all
        changeAppearButtonCheckAll();

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

        // If uncheck a button and all buttons at same level are uncheck
        // Let's uncheck its parent
        if ($(this).prop("checked") == false) {
            let checkLevel = $(this).attr("level-input");
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
                    ".form-check-input[level-input=" +
                        checkLevel +
                        "]:checkbox:checked"
                );
            if (checkBoxes.length == 0) {
                parent.prop("checked", false);
            }
        }
    });
}

// Change appear button check all
function changeAppearButtonCheckAll() {
    if (
        $("input.form-check-input:checkbox:checked").length ==
        $("input.form-check-input:checkbox").length
    ) {
        $("#btn-ck-all i").text("check_box");
    } else if ($("input.form-check-input:checkbox:checked").length > 0) {
        $("#btn-ck-all i").text("indeterminate_check_box");
    } else {
        $("#btn-ck-all i").text("check_box_outline_blank");
    }
}

function renderButtonCheckAll() {
    let checkBoxes = $(".form-check-input");
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));

    if (
        $("input.form-check-input:checkbox:checked").length ==
        $("input.form-check-input:checkbox").length
    ) {
        $("#btn-ck-all i").text("check_box");
    } else if ($("input.form-check-input:checkbox:checked").length > 0) {
        $("#btn-ck-all i").text("indeterminate_check_box");
    } else {
        $("#btn-ck-all i").text("check_box_outline_blank");
    }
}

/**
 * Click remove an item
 *
 * @param delete_url string
 */
export function deleteAnItem(delete_url, item_name = "mục") {
    $(".delete-category").click(function(e) {
        e.preventDefault();

        let _this = $(this);
        let delete_id = $(this).attr("data-id");
        Swal.fire({
            title: "Bạn chắc chứ?",
            text: `Hành động sẽ xóa vĩnh viễn ${item_name} này!`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            cancelButtonClass: "btn",
            confirmButtonText: "Đúng, xóa nó đi",
            cancelButtonText: "Thôi không xóa",
            buttonsStyling: false
        })
            .then(function(result) {
                if (result.value) {
                    Swal.fire({
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    $.ajax({
                        url: delete_url + "/" + delete_id,
                        method: "POST",
                        data: {
                            _method: "DELETE"
                        },
                        success: function() {
                            _this.closest("li").remove();
                            Swal.fire({
                                title: "Thành công",
                                text: "Bài viết đã được xóa.",
                                type: "success",
                                confirmButtonClass: "btn btn-success",
                                buttonsStyling: false
                            }).then(function() {
                                location.reload();
                            });
                            changeAppearButtonCheckAll();
                        },
                        error: function(err) {
                            if (err.status === 403) {
                                Swal.fire({
                                    title: "Không được phép!",
                                    type: "error",
                                    confirmButtonClass: "btn btn-danger",
                                    buttonsStyling: false,
                                    html:
                                        "\
                                        <p>Bạn không đủ quyền hạn để thực hiện hành động này.</p>\
                                        <hr>\
                                        <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                                }).catch(swal.noop);
                            } else {
                                Swal.fire({
                                    title: "Lỗi",
                                    text: `Hãy đảm bảo rằng không còn bài viết và ${item_name} con nào thuộc ${item_name} cần xóa!`,
                                    type: "error",
                                    confirmButtonClass: "btn btn-danger",
                                    buttonsStyling: false
                                }).catch(swal.noop);
                            }
                        }
                    });
                }
            })
            .catch(swal.noop);
    });
}

/**
 * Click remove selected items
 *
 * @param delete_url string
 */
export function deleteMultipleItems(delete_url, item_name = "mục") {
    $("#btn-del-all").click(function() {
        var countchecked = $("input.form-check-input:checkbox:checked").length;
        if (countchecked > 0) {
            Swal.fire({
                title: "Bạn chắc chứ?",
                text: `Hành động sẽ xóa vĩnh viễn những ${item_name} đã chọn!`,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger",
                cancelButtonClass: "btn",
                confirmButtonText: "Đúng, xóa hết đi",
                cancelButtonText: "Thôi không xóa",
                buttonsStyling: false
            })
                .then(function(result) {
                    if (result.value) {
                        let delete_id = "";
                        $("input.form-check-input:checkbox:checked").each(
                            function(index) {
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
                            url: delete_url,
                            method: "POST",
                            data: {
                                ids: delete_id,
                                _method: "DELETE"
                            },
                            success: function() {
                                // for (
                                //     ;
                                //     $("input.form-check-input:checkbox:checked")
                                //         .length > 0;

                                // ) {
                                //     let _this = $(
                                //         "input.form-check-input:checkbox:checked"
                                //     ).first();
                                //     _this.closest("li").remove();
                                // }
                                Swal.fire({
                                    title: "Thành công",
                                    text: `Đã xóa các ${item_name} được chọn.`,
                                    type: "success",
                                    confirmButtonClass: "btn btn-success",
                                    buttonsStyling: false
                                }).then(function() {
                                    location.reload();
                                });
                                changeAppearButtonCheckAll();
                            },
                            error: function(err) {
                                if (err.status === 403) {
                                    Swal.fire({
                                        title: "Không được phép!",
                                        type: "error",
                                        confirmButtonClass: "btn btn-danger",
                                        buttonsStyling: false,
                                        html:
                                            "\
                                    <p>Bạn không đủ quyền hạn để thực hiện hành động này.</p>\
                                    <hr>\
                                    <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                                    }).catch(swal.noop);
                                } else {
                                    Swal.fire({
                                        title: "Lỗi",
                                        text: `Hãy đảm bảo rằng không còn bài viết và ${item_name} con nào thuộc ${item_name} cần xóa!`,
                                        type: "error",
                                        confirmButtonClass: "btn btn-danger",
                                        buttonsStyling: false
                                    }).catch(swal.noop);
                                }
                            }
                        });
                    }
                })
                .catch(swal.noop);
        } else {
            Swal.fire({
                title: "Err...",
                text: `Chưa chọn ${item_name} nào cả.`,
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            }).catch(swal.noop);
        }
    });
}

export function makeTableOrderable(order_url) {
    $(".sort").sortable({
        handle: ".connect",
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
        update: function(event, ui) {
            let sort = $(this).sortable("toArray");
            $.ajax({
                url: order_url,
                method: "POST",
                data: {
                    sort: sort
                },
                error: function(err) {
                    if (err.status === 403) {
                        Swal.fire({
                            title: "Lỗi!",
                            type: "error",
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false,
                            html:
                                "\
                                <p>Bạn không đủ quyền hạn để thực hiện hành động này. Mọi thay đổi sẽ không được lưu lại.</p>\
                                <hr>\
                                <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                        }).catch(swal.noop);
                    }
                }
            });
        }
    });
}

export function updateViewViewStatus(updateUrl) {
    $(".btn-update-view-status").off(".updateViewStatus");
    $(".btn-update-view-status").on("click.updateViewStatus", _.throttle(function() {
        let context = $(this);
        let data = {
            value: context.attr('data-value'),
            id: context.attr('data-id'),
            field: context.attr('data-field')
        }
        // console.log(data);

        $.ajax({
            url: updateUrl,
            method: "POST",
            data: data,
            success: function (scs) {
                console.log(scs.value);

                if (scs.value) {
                    console.log('in');

                    context.attr('title', "Click để tắt");
                    context.attr('data-value', scs.value);
                    context.find(".material-icons").addClass("text-primary").text("check_circle_outline");
                } else {
                    console.log('out');

                    context.attr('title', "Click để bật");
                    context.attr('data-value', 0);
                    context.find(".material-icons").removeClass("text-primary").text("highlight_off");
                }
                return;
            },
            error: function (err) {

            }
        })
    }, 500));
}
