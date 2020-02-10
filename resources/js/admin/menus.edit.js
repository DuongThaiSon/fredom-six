import { swalWithDangerConfirmButton } from "../core";

$(document).ready(function () {
    const CUSTOM_LINK = 0;
    const LINK_TO_ARTICLE_CATEGORY = 1;
    const SYNC_WITH_ARTICLE_CATEGORY = 2;
    const SYNC_WITH_ALL_ARTICLE_CATEGORIES = 3;
    const LINK_TO_ARTICLE = 4;
    const LINK_TO_PRODUCT_CATEGORY = 5;
    const SYNC_WITH_PRODUCT_CATEGORY = 6;
    const SYNC_WITH_ALL_PRODUCT_CATEGORIES = 7;
    const LINK_TO_PRODUCT = 8;
    const listArticleCategoriesUrl = $('#listArticleCategories').val();
    const showArticleCategoryUrl = $('#showArticleCategory').val();
    const listProductCategoriesUrl = $('#listProductCategories').val();
    const showProductCategoryUrl = $('#showProductCategory').val();
    const listArticlesUrl = $('#listArticles').val();
    const listArticlesDatatablesUrl = $('#listArticlesDatatables').val();
    const showArticleUrl = $('#showArticle').val();
    const listProductsUrl = $('#listProducts').val();
    const showProductUrl = $('#showProduct').val();
    const listProductsDatatablesUrl = $('#listProductsDatatables').val();
    validateFormInput()
    chooseAnotherRecord()

    $("select[name=type]").on('change', function (e) {
        e.preventDefault();
        const selectedType = parseInt($(this).val());
        switch (selectedType) {
            case LINK_TO_ARTICLE_CATEGORY:
            case SYNC_WITH_ARTICLE_CATEGORY:
                showListing(listArticleCategoriesUrl);
                break;
            case LINK_TO_ARTICLE:
                showListing(listArticlesUrl).done(function () {
                    initDatatables(listArticlesDatatablesUrl)
                });
                break;
            case LINK_TO_PRODUCT_CATEGORY:
            case SYNC_WITH_PRODUCT_CATEGORY:
                showListing(listProductCategoriesUrl);
                break;
            case LINK_TO_PRODUCT:
                showListing(listProductsUrl).done(function () {
                    initDatatables(listProductsDatatablesUrl)
                });
                break;
            case CUSTOM_LINK:
            case SYNC_WITH_ALL_ARTICLE_CATEGORIES:
            case SYNC_WITH_ALL_PRODUCT_CATEGORIES:
                hideResultZone();
                break;
            default:
                console.log('No action.')
                break;
        }
    });

    const hideResultZone = function () {
        $('.result-zone').html('');
    }

    const showListing = function (listingUrl) {
        const ajax = $.ajax({
            url: listingUrl,
            success: function (scs) {
                $('.result-zone').html(scs);
                chooseRecord();
            },
            error: function (err) {
                console.log(err);
            }
        });
        return ajax;
    }

    const chooseRecord = function () {
        $('.choose-record').off('click.chooseRecord')
        $('.choose-record').on('click.chooseRecord', function (e) {
            e.preventDefault();
            const selectedType = parseInt($("#list-option").val());
            let showRecordUrl;
            switch (selectedType) {
                case LINK_TO_ARTICLE_CATEGORY:
                case SYNC_WITH_ARTICLE_CATEGORY:
                    showRecordUrl = showArticleCategoryUrl;
                    break;
                case LINK_TO_ARTICLE:
                    showRecordUrl = showArticleUrl;
                    break;
                case LINK_TO_PRODUCT_CATEGORY:
                case SYNC_WITH_PRODUCT_CATEGORY:
                    showRecordUrl = showProductCategoryUrl;
                    break;
                case LINK_TO_PRODUCT:
                    showRecordUrl = showProductUrl;
                    break;
                default:
                    console.log('No action.')
                    break;
            }
            const objectId = $(this).data('id');

            $.ajax({
                url: `${showRecordUrl}?object_id=${objectId}`,
                success: function (resolve) {
                    $('.result-zone').html(resolve)
                    chooseAnotherRecord()
                }
            });
        });
    };

    function initDatatables(fetchUrl) {
        $('#datatables').DataTable({
            ordering: false,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: fetchUrl,
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: null,
                    render: function (data) {
                        return `
                        <a href="#" data-id="${data.id}" class="btn btn-sm p-1 choose-record" style="padding:0;" data-toggle="tooltip" title="Chọn">
                            <i class="material-icons">library_add</i> Chọn
                        </a>
                        `;
                    },
                    searchable: false
                }
            ],
            pagingType: "simple_numbers",
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
                chooseRecord()
            }
        });
    }

    function chooseAnotherRecord() {
        $('.choose-another').off('click.chooseAnother')
        $('.choose-another').on('click.chooseAnother', function (e) {
            e.preventDefault();
            const selectedType = parseInt($("#list-option").val());
            switch (selectedType) {
                case LINK_TO_ARTICLE_CATEGORY:
                case SYNC_WITH_ARTICLE_CATEGORY:
                    showListing(listArticleCategoriesUrl);
                    break;
                case LINK_TO_ARTICLE:
                    showListing(listArticlesUrl).done(function () {
                        initDatatables(listArticlesDatatablesUrl)
                    });
                    break;
                case LINK_TO_PRODUCT_CATEGORY:
                case SYNC_WITH_PRODUCT_CATEGORY:
                    showListing(listProductCategoriesUrl);
                    break;
                case LINK_TO_PRODUCT:
                    showListing(listProductsUrl).done(function () {
                        initDatatables(listProductsDatatablesUrl)
                    });
                    break;
                default:
                    console.log('No action.')
                    break;
            }
        });
    }

    function validateFormInput() {
        $("#submit-menu-form").off("submit.validateFormInput")
        $("#submit-menu-form").on("submit.validateFormInput", function (e) {
            const selectedType = parseInt($("#list-option").val());
            const objectId = $("#object_id").val()
            const url = $("input[name=link]").val()
            if ((selectedType === LINK_TO_ARTICLE_CATEGORY ||
                selectedType === SYNC_WITH_ARTICLE_CATEGORY ||
                selectedType === LINK_TO_PRODUCT_CATEGORY ||
                selectedType === SYNC_WITH_PRODUCT_CATEGORY) && !objectId) {
                swalWithDangerConfirmButton.fire({
                    title: "Lỗi",
                    text: "Hãy chọn một mục",
                    icon: "error",
                })
                return false;
            }
            if (selectedType === LINK_TO_ARTICLE && !objectId) {
                swalWithDangerConfirmButton.fire({
                    title: "Lỗi",
                    text: "Hãy chọn một bài viết",
                    icon: "error",
                })
                return false;
            }
            if (selectedType === LINK_TO_PRODUCT && !objectId) {
                swalWithDangerConfirmButton.fire({
                    title: "Lỗi",
                    text: "Hãy chọn một sản phẩm",
                    icon: "error",
                })
                return false;
            }
            if (selectedType === CUSTOM_LINK && !url) {
                swalWithDangerConfirmButton.fire({
                    title: "Lỗi",
                    text: "URL không được để trống",
                    icon: "error",
                })
                return false;
            }
            return true;
        })
    }
});
