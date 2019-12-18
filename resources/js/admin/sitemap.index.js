$(document).ready(function() {
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
                render: function(data) {
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
        // data: data
    })
})
