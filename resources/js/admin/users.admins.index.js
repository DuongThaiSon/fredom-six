import { initCheckboxButton, swalWithDangerConfirmButton, swalWithSuccessConfirmButton } from '../core';

$(document).ready(function () {
    initDatatables();
    const destroyManyUrl = $("#table").data("destroy-many");

    function initDatatables() {
        const fetchUrl = $('#table').data('url');
        $('#table').DataTable({
            ordering: false,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: fetchUrl,
            columns: [
                {
                    className: 'rowlink-skip',
                    data: null,
                    searchable: false,
                    render: function (data) {
                        return `
                            <a href="/admin/users/admins/${data.id}"></a>
                            <div class="pretty p-icon p-curve p-smooth">
                                <input type="checkbox" class="form-check-input" value="${data.id}"
                                    data-id="${data.id}" />
                                <div class="state p-primary">
                                    <i class="icon material-icons">done</i>
                                    <label></label>
                                </div>
                            </div>`
                    }
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: null,
                    searchable: false,
                    render: function (data) {
                        if (!data.email_verified_at) {
                            return `
                                <i class="material-icons">
                                    visibility_off
                                </i>&nbsp;&nbsp;Chưa kích hoạt`
                        }
                        if (data.is_active) {
                            return `
                                <i class="material-icons text-success">
                                    visibility
                                </i>&nbsp;&nbsp;Đang hoạt động`
                        }
                        if (!data.is_active) {
                            return `
                            <i class="material-icons text-danger">
                                lock
                            </i>&nbsp;&nbsp;Bị khoá`
                        }
                        return ``
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: null,
                    className: 'rowlink-skip text-right',
                    render: function (data) {
                        return `
                            <a href="/admin/users/admins/${data.id}/edit" class="btn btn-sm p-1"
                                style="padding:0;" data-toggle="tooltip" title="Sửa">
                                <i class="material-icons">border_color</i>
                            </a>
                            <a href="/admin/users/admins/${data.id}"
                                class="btn btn-sm p-1 btn-destroy" data-toggle="tooltip" title="Xoá">
                                <i class="material-icons">delete</i>
                            </a>`;
                    },
                    searchable: false
                }
            ],
            pagingType: "first_last_numbers",
            lengthMenu: [
                [10, 25],
                [10, 25]
            ],
            responsive: true,
            language: {
                paginate: {
                    first: 'Đầu',
                    previous: 'Trước',
                    next: 'Sau',
                    last: 'Cuối'
                },
                loadingRecords: "<img src='/backyard/img/loader4.gif' alt='Processing...'>",
                search: "_INPUT_",
                searchPlaceholder: "Tìm kiếm nhanh",
                lengthMenu: 'Hiển thị <select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '</select> bản ghi',
                emptyTable: "Không tìm thấy bản ghi",
                zeroRecords: "Không tìm thấy bản ghi",
                info: "Đang hiển thị bản ghi _START_ đến _END_ trong _MAX_ bản ghi",
                infoEmpty: "Không có mục nào để hiển thị",
                infoFiltered: " - lọc từ _MAX_ bản ghi"

            },
            // Event fired when table is draw
            fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
                $('#table tbody').rowlink()
                $('[data-toggle="tooltip"]').tooltip()
                initCheckboxButton()
                deleteSingleItem()
                deleteMultipleItems(destroyManyUrl)
            }
        });
    }

    function deleteSingleItem(itemName = "mục") {
        $('#table a.btn-destroy').off('click.deleteSingleItem')
        $('#table a.btn-destroy').on('click.deleteSingleItem', function (e) {
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
                            $('#table').DataTable().draw('page');
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

    function deleteMultipleItems(deleteUrl, itemName = "mục") {
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
                                        $('#table').DataTable().draw('page');
                                    });
                                    initCheckboxButton();
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
})
