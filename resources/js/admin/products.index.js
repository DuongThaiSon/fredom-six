import { makeTableOrderable, initCheckboxButton, swalWithDangerConfirmButton, swalWithSuccessConfirmButton } from '../core';

$(document).ready(function () {
    initDatatables();
    // initContactStatusFilter();
    const destroyManyUrl = $("#table").data("destroy-many");
    const orderUrl = $("#table").data("order");

    function initDatatables() {
        const fetchUrl = $('#table').data('list');
        $('#table').DataTable({
            ordering: false,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: {
                url: fetchUrl,
            },
            // order: [[ 6, "desc" ]],
            columns: [
                {
                    className: 'connect rowlink-skip',
                    data: null,
                    searchable: false,
                    render: function (data) {
                        return `
                            <a href="${data.route.edit}" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                                <i class="material-icons">format_line_spacing</i>
                            </a>
                        `
                    }
                },
                {
                    className: 'rowlink-skip',
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data) {
                        return `
                            <a href="#contactDetailModal" data-toggle="modal" data-id="${data.id}"></a>
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
                    data: 'categories',
                    name: 'categories.name'
                },
                {
                    className: 'rowlink-skip',
                    data: null,
                    render: function (data) {
                        return `
                            <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                <input type="checkbox" class="btn-update-view-status" data-id="${data.id}"
                                    ${data.is_public ? 'checked' : ''} name="is_public"/>
                                <div class="state p-on p-primary-o">
                                    <i class="icon material-icons">check</i>
                                    <label></label>
                                </div>
                                <div class="state p-off">
                                    <i class="icon material-icons">clear</i>
                                    <label></label>
                                </div>
                            </div>
                        `
                    }
                },
                {
                    className: 'rowlink-skip',
                    data: null,
                    render: function (data) {
                        return `
                            <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                <input type="checkbox" class="btn-update-view-status" data-id="${data.id}"
                                    ${data.is_highlight ? 'checked' : ''} name="is_highlight"/>
                                <div class="state p-on p-primary-o">
                                    <i class="icon material-icons">check</i>
                                    <label></label>
                                </div>
                                <div class="state p-off">
                                    <i class="icon material-icons">clear</i>
                                    <label></label>
                                </div>
                            </div>
                        `
                    }
                },
                {
                    className: 'rowlink-skip',
                    data: null,
                    render: function (data) {
                        return `
                            <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                <input type="checkbox" class="btn-update-view-status" data-id="${data.id}"
                                    ${data.is_new ? 'checked' : ''} name="is_new"/>
                                <div class="state p-on p-primary-o">
                                    <i class="icon material-icons">check</i>
                                    <label></label>
                                </div>
                                <div class="state p-off">
                                    <i class="icon material-icons">clear</i>
                                    <label></label>
                                </div>
                            </div>
                        `
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: null,
                    orderable: false,
                    className: 'rowlink-skip text-right',
                    render: function (data) {
                        return `
                            <div class="btn-group">
                                <a href="${data.route.edit}" class="btn btn-sm p-1"
                                    style="padding:0;" data-toggle="tooltip" title="Sửa">
                                    <i class="material-icons">border_color</i>
                                </a>
                                <a href="${data.route.clone}"
                                    class="btn btn-sm p-1 btn-copy" data-id="{{$article->id}}" data-toggle="tooltip"
                                    title="Tạo bản sao">
                                    <i class="material-icons">file_copy</i>
                                </a>
                                <a class="btn btn-sm p-1 btn-move-top"
                                href="${data.route.moveTop}" data-toggle="tooltip"
                                    title="Đưa lên đầu tiên">
                                    <i class="material-icons">call_made</i>
                                </a>
                                <a href="${data.route.destroy}"
                                    class="btn btn-sm p-1 btn-destroy" data-toggle="tooltip" title="Xoá">
                                    <i class="material-icons">delete</i>
                                </a>
                            </div>`;
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
                initContactFormData();
                makeTableOrderable(orderUrl, "#table tbody")
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

    function initContactFormData() {
        $("#contactDetailModal").off('show.bs.modal')
        $("#contactDetailModal").on('show.bs.modal', function (e) {
            const source = $(e.relatedTarget)
            const contactId = source.data('id')
            const _modal = $(this)
            $.ajax({
                url: `/admin/contacts/${contactId}/edit`,
                success: (resolve) => {
                    _modal.find(".modal-title").text(resolve.contact.title)
                    _modal.find("input[name=id]").val(resolve.contact.id)
                    _modal.find("input[name=name]").val(resolve.contact.name)
                    _modal.find("input[name=email]").val(resolve.contact.email)
                    _modal.find("input[name=phone]").val(resolve.contact.phone)
                    _modal.find("input[name=address]").val(resolve.contact.address)
                    _modal.find("textarea[name=content]").val(resolve.contact.content)
                    _modal.find("textarea[name=note]").val(resolve.contact.note)
                    _modal.find("select[name=status]").val(resolve.contact.status)
                }
            })
        })

        $("#contactDetailModal").off('hide.bs.modal')
        $("#contactDetailModal").on('hide.bs.modal', function (e) {
            $('#table').DataTable().draw('page');
        })


        $(".btn-update-contact").off("click.initContactFormData")
        $(".btn-update-contact").on("click.initContactFormData", function (e) {
            e.preventDefault()
            const _modal = $("#contactDetailModal")
            const formData = {
                note: _modal.find("textarea[name=note]").val(),
                status: _modal.find("select[name=status]").val(),
                _method: "PUT"
            }
            const contactId = _modal.find("input[name=id]").val()
            $.ajax({
                url: `/admin/contacts/${contactId}`,
                method: 'POST',
                data: formData,
                success: () => {
                    $('#table').DataTable().draw('page')
                    _modal.modal('hide')
                }
            })
        })
    }

    function initContactStatusFilter() {
        $("select[name=filter_status]").off(".initContactStatusFilter")
        $("select[name=filter_status]").on("change.initContactStatusFilter", function () {
            console.log($(this).val());
            $('#table').DataTable().draw();
        })
    }
})
