$(document).ready(function () {
    $(".btn-request-restore").on("click.btnRequestRestore", function (e) {
        e.preventDefault()
        let formData = new FormData()
        formData.append('import_file', $('input[name=import_file]')[0].files[0])

        let restoreUrl = $(this).parents('form').attr('action')
        let indexUrl = $(this).attr('data-target')

        Swal.fire({
            title: 'Bạn có chắc muốn thực hiện hành động?',
            text: "Cơ sở dữ liệu sẽ bị ghi đè bởi tệp đã chọn!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Khôi phục!',
            cancelButtonText: "Huỷ"
          }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: "Đang tạo sao lưu cho thời điểm hiện tại!",
                    text: "Xin chờ...",
                    onBeforeOpen: () => Swal.showLoading(),
                    allowOutsideClick: false
                });
                $.ajax({
                    url: restoreUrl,
                    data: formData,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    accepts: {
                        json: 'application/json'
                    },
                    success: function() {
                        Swal.fire({
                            title: 'Thành công',
                            type: 'success',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = indexUrl
                            }
                        })
                    },
                    error: function(reject) {
                        errorText = reject.responseJSON.errors

                        Swal.fire({
                            text: errorText[Object.keys(errorText)[0]],
                            type: 'error',
                        })
                    }
                })
            }
        })

    });
})
