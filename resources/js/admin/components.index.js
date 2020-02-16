import { swalWithDangerConfirmButton, swalWithSuccessConfirmButton } from '../core';

$(document).ready(function () {
    initDatatables();

    function initDatatables() {
        const fetchUrl = $('#table').data('list');
        $('#table').DataTable({
            ordering: true,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: {
                url: fetchUrl,
            },
            order: [[3, "desc"]],
            columnDefs: [{
                render: function (data, type, row) {
                    if (data) {
                        return `
                            <i class="material-icons text-success">
                                visibility
                            </i>&nbsp;&nbsp;Khả dụng`
                    }
                    return `
                        <i class="material-icons">
                            visibility_off
                        </i>&nbsp;&nbsp;Không khả dụng`
                },
                targets: 2
            }],
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'key',
                    name: 'key'
                },
                {
                    data: 'is_public',
                    name: 'is_public'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: null,
                    orderable: false,
                    className: 'rowlink-skip text-right',
                    render: function (data) {
                        return `
                            <a href="#componentDetailModal" data-toggle="modal" data-id="${data.id}"></a>
                            <a href="/admin/components/${data.id}"
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
                deleteSingleItem()
                initComponentFormData()
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

    function initComponentFormData() {
        $("#componentDetailModal").off('show.bs.modal')
        $("#componentDetailModal").on('show.bs.modal', function (e) {
            const source = $(e.relatedTarget)
            const componentId = source.data('id')
            const _modal = $(this)
            if (componentId) {
                $.ajax({
                    url: `/admin/components/${componentId}/edit`,
                    success: (resolve) => {
                        _modal.find(".modal-title").text(resolve.component.name)
                        _modal.find("input[name=id]").val(resolve.component.id)
                        _modal.find("input[name=name]").val(resolve.component.name)
                        _modal.find("input[name=key]").val(resolve.component.key)
                        _modal.find("textarea[name=value]").val(resolve.component.value)
                        _modal.find("input[name=is_public]").attr('checked', resolve.component.is_public)
                    }
                })
            } else {
                _modal.find(".modal-title").text("")
                _modal.find("input[name=id]").val("")
                _modal.find("input[name=name]").val("")
                _modal.find("input[name=key]").val("")
                _modal.find("textarea[name=value]").val("")
                _modal.find("input[name=is_public]").attr('checked', true)
            }

        })

        $("#componentDetailModal").off('hide.bs.modal')
        $("#componentDetailModal").on('hide.bs.modal', function (e) {
            $('#table').DataTable().draw('page');
        })


        $(".btn-update-component").off("click.initComponentFormData")
        $(".btn-update-component").on("click.initComponentFormData", function (e) {
            e.preventDefault()
            const _modal = $("#componentDetailModal")
            const formData = {
                name: _modal.find("input[name=name]").val(),
                key: _modal.find("input[name=key]").val(),
                value: _modal.find("textarea[name=value]").val(),
            }
            if (_modal.find("input[name=is_public]:checked").length) {
                formData.is_public = true;

            }
            const componentId = _modal.find("input[name=id]").val()
            if (componentId) {
                formData._method = "PUT"
            }

            $.ajax({
                url: `/admin/components/${componentId}`,
                method: 'POST',
                data: formData,
                success: () => {
                    $('#table').DataTable().draw('page')
                    _modal.modal('hide')
                }
            })
        })
    }
})
