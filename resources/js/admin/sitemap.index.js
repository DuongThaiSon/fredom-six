$(document).ready(function () {
    let sitemapDataUrl = $("#sitemap-table").data('href')
    let table = $("#sitemap-table").DataTable({
        ordering: false,
        pagingType: "numbers",
        serverSide: true,
        ajax: sitemapDataUrl,
        columns: [
            {
                data: 'loc',
                name: 'loc'
            },
            {
                data: null,
                name: 'priority',
                render: function (data) {
                    return `${data.priority * 100}%`;
                }
            },
            {
                data: 'changefreq',
                name: 'changefreq'
            },
            {
                data: 'lastmod',
                name: 'lastmod'
            }
        ]
    })

    $(".btn-generate-sitemap").on("click", function (e) {
        e.preventDefault()
        let generateSitemapUrl = $(this).attr('href')
        Swal.fire({
            title: 'Bạn có chắc muốn thực hiện hành động?',
            showCancelButton: true,
            cancelButtonText: 'Huỷ',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return $.ajax({
                    url:generateSitemapUrl,
                    method: "POST",
                    success: response => {
                        return response;
                    },
                    error: error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value) {
                table.ajax.reload();
                Swal.fire(
                    'Thành công!',
                    'Sitemap đã được cập nhật.',
                    'success'
                  )
            }
        })
    })
})
