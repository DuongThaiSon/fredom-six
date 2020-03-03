import { swalWithDangerConfirmButton, swalWithSuccessConfirmButton } from '../core';

$(document).ready(function () {
    initDatatables();
    initLanguageStatusFilter();

    function initDatatables() {
        $('#table').DataTable({
            ordering: true,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: {
                url: 'http://127.0.0.1:8001/admin/translations',
                data: function(d) {
                    d.locale = $("select[name=locale]").val()
                }
            },
            columns: [
                {
                    data: 'key',
                    name: 'key'
                },
                {
                    data: 'source_text',
                    name: 'source_text'
                },
                {
                    data: 'target_text',
                    name: 'target_text'
                },
                {
                    data: null,
                    orderable: false,
                    className: 'rowlink-skip text-right',
                    render: function (data) {
                        return `
                            <a href="#translationDetailModal" data-toggle="modal" data-id="${data.id}"></a>
                            <a href="${data.route.destroy}"
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
                initLanguageFormData()
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

    function initLanguageFormData() {
        $("#translationDetailModal").off('show.bs.modal')
        $("#translationDetailModal").on('show.bs.modal', function (e) {
            const source = $(e.relatedTarget)
            const translationId = source.data('id')
            const _modal = $(this)
            if (translationId) {
                $.ajax({
                    url: `/admin/translations/${translationId}/edit`,
                    success: (resolve) => {
                        _modal.find(".modal-title").text(resolve.translation.name)
                        _modal.find("input[name=id]").val(resolve.translation.id)
                        _modal.find("input[name=name]").val(resolve.translation.name)
                        _modal.find("input[name=locale]").val(resolve.translation.locale)
                    }
                })
            } else {
                _modal.find(".modal-title").text("")
                _modal.find("input[name=id]").val("")
                _modal.find("input[name=name]").val("")
                _modal.find("input[name=locale]").val("")
            }

        })

        $("#translationDetailModal").off('hide.bs.modal')
        $("#translationDetailModal").on('hide.bs.modal', function (e) {
            $('#table').DataTable().draw('page');
        })


        $(".btn-update-translation").off("click.initLanguageFormData")
        $(".btn-update-translation").on("click.initLanguageFormData", function (e) {
            e.preventDefault()
            const _modal = $("#translationDetailModal")
            const formData = {
                name: _modal.find("input[name=name]").val(),
                locale: _modal.find("input[name=locale]").val(),
            }
            const translationId = _modal.find("input[name=id]").val()
            if (translationId) {
                formData._method = "PUT"
            }

            $.ajax({
                url: `/admin/translations/${translationId}`,
                method: 'POST',
                data: formData,
                success: () => {
                    $('#table').DataTable().draw('page')
                    _modal.modal('hide')
                }
            })
        })
    }

    function initLanguageStatusFilter() {
        $("select[name=locale]").off(".initLanguageStatusFilter")
        $("select[name=locale]").on("change.initLanguageStatusFilter", function() {
            $('#table').DataTable().draw();
        })
    }
})
