import Swal from "sweetalert2"

$(document).ready(function() {
    btnOpenFormSetting()
    btnSubmitFormSetting()
    btnDeleteSetting()
})

function btnOpenFormSetting() {
    $('.btn-open-form-setting').off('click.btnOpenFormSetting')
    $('.btn-open-form-setting').on('click.btnOpenFormSetting', function(e) {
        e.preventDefault()
        let formUrl = $(this).attr('href')
        let settingFormModal = $('.modal-open-setting-form')
        $.ajax({
            url: formUrl,
            headers: {
                'Accept': 'application/json'
            },
            success: function(resolve) {
                settingFormModal.find('.modal-body').html(resolve.data)
                settingFormModal.modal('show')
            }
        })
    })
}

function btnSubmitFormSetting() {
    $('.btn-submit-form-setting').off('click.btnSubmitFormSetting')
    $('.btn-submit-form-setting').on('click.btnSubmitFormSetting', function(e) {
        e.preventDefault()
        let settingFormModal = $('.modal-open-setting-form')
        let submitUrl = settingFormModal.find('form').attr('action')
        let formData = {
            'display_name': settingFormModal.find('input[name=display_name]').val(),
            'key': settingFormModal.find('input[name=key]').val(),
            'value': settingFormModal.find('textarea[name=value]').val(),
            'details': settingFormModal.find('textarea[name=details]').val(),
        }
        if ($('input[name=_method]').length > 0) {
            formData._method = $('input[name=_method]').val()
        }
        $.ajax({
            url: submitUrl,
            headers: {
                'Accept': 'application/json'
            },
            method: "POST",
            data: formData,
            success: function(resolve) {
                $("#cat_table").html(resolve.data)
                settingFormModal.modal('hide')
                btnSubmitFormSetting()
                btnDeleteSetting()
                Swal.fire(
                    'Thành công!',
                    '',
                    'success'
                )
            },
            error: function(reject) {
                errorText = reject.responseJSON.errors
                settingFormModal.find('.alert').html(errorText[Object.keys(errorText)[0]]).removeClass('d-none')
                settingFormModal.find('.alert').removeClass('d-none')
            }
        })
    })
}

function btnDeleteSetting() {
    $(".btn-delete-setting").off("click.btnDeleteSetting")
    $(".btn-delete-setting").on("click.btnDeleteSetting", function(e) {
        e.preventDefault()
        let deleteUrl = $(this).attr('href')
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Hành động này sẽ xoá vĩnh viễn thông số đang chọn!',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Xoá',
            cancelButtonText: 'Huỷ'
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: deleteUrl,
                    method: "POST",
                    data: {
                        _method: "DELETE"
                    },
                    success: function(resolve) {
                        Swal.fire(
                            'Thành công!',
                            '',
                            'success'
                        )
                        $("#cat_table").html(resolve.data)
                        btnSubmitFormSetting()
                        btnDeleteSetting()
                    }
                })
            }
        })
    })
}
