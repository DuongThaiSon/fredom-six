$(document).ready(function() {
    btnCreateBackup();
    btnDeleteBackup();
});

let btnCreateBackup = function() {
    $(".btn-create-backup").on("click.btnCreateBackup", function(e) {
        e.preventDefault();

        const createBackupUrl = $(this).attr("href");
        const backupOptions = {
            only_db: "Chỉ cơ sở dữ liệu",
            only_files: "Chỉ tệp tin hệ thống",
            both: "Cả hai"
        };

        Swal.mixin({
            confirmButtonText: "Next &rarr;",
            showCancelButton: true,
            progressSteps: ["1", "2"]
        })
            .queue([
                {
                    title: "Select color",
                    input: "radio",
                    inputOptions: backupOptions,
                    inputValidator: value => {
                        if (!value) {
                            return "Cần phải chọn 1 loại!";
                        }
                    }
                },
                {
                    title: "Thông báo",
                    input: "checkbox",
                    inputPlaceholder:
                        "Nhận thông báo về việc sao lưu lần này vào hòm thư hệ thống",
                    inputValue: 1
                }
            ])
            .then(result => {
                if (result.value) {
                    const answers = JSON.stringify(result.value);
                    Swal.fire({
                        title: "Đang tạo sao lưu cho thời điểm hiện tại!",
                        text: "Xin chờ...",
                        onBeforeOpen: () => Swal.showLoading(),
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: createBackupUrl,
                        data: {
                            options: answers
                        },
                        method: "POST",
                        success: function(scs) {
                            Swal.fire(
                                "Thành công!",
                                "Đã tạo sao lưu cho thời điểm hiện tại",
                                "success"
                            ).then(function() {
                                $("#table-list-backup").html(scs)
                                btnDeleteBackup()
                            });
                        }
                    });
                }
            });
    });
};

let btnDeleteBackup = function() {
    $(".btn-delete-backup").off("click.btnDeleteBackup");
    $(".btn-delete-backup").on("click.btnDeleteBackup", function(e) {
        e.preventDefault();
        const deleteBackupUrl = $(this).attr("href");

        Swal.fire({
            title: "Xóa tệp sao lưu này?",
            text: "Bạn sẽ không thể lấy lại tệp đã xóa!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "",
            confirmButtonText: "Đúng, xóa nó đi!",
            cancelButtonText: "Hủy",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    url: deleteBackupUrl,
                    method: "POST",
                    data: {
                        _method: "DELETE"
                    },
                    success: response => {
                        return response;
                    },
                    error: error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    }
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then(result => {
            if (result.value) {
                $("#table-list-backup").html(result.value);
                btnDeleteBackup();
            }
        });
    });
};
