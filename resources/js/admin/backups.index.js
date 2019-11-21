$(document).ready(function() {
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
                                $("#table-list-backup").html(scs);
                            });
                        }
                    });
                }
            });
    });
});
