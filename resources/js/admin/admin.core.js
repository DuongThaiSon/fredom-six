import Swal from "sweetalert2";
import { swalWithSuccessConfirmButton, deleteSingleItem, makeTableOrderable } from '../core'

export class productAttributeCore {
    constructor() { }

    applyAttributeType() {
        $("input[name=type]").on("change.applyAttributeType", function () {
            let type = $("input[name=type]:checked").val()
            $(".selection-item-value").attr('type', type)
        })
    }

    submitData() {
        let _this = this
        $(".btn-submit-data").on("click.submitData", function (e) {
            e.preventDefault();
            if (!_this.canPassValidateData()) {
                return;
            }
            $('.form-main').submit()
        });
    }

    canPassValidateData() {
        let validated = true;
        if (_.trim($("input[name=name]").val()).length < 1) {
            validated = false;
        }

        return validated;
    }

    addSelectionItem() {
        let type = $("input[name=type]:checked").val()
        let element = this.generateSelectionItem(type)
        $(".selection-list").append(element);
        this.removeSelectionItem();
    }

    generateSelectionItem(type = "text", id = "", value = "") {
        let index = Date.now()
        return `
        <div class="row form-group selection-item">
            <div class="col-5">
                <input type="hidden" name="attribute_values[${index}][id]" value="${id}" class="selection-item-id"/>
                <input type="${type}" name="attribute_values[${index}][value]" value="${value}" class="selection-item-value"/>
            </div>
            <div class="col-5">
                <input type="text" name="attribute_values[${index}][note]" value="" class="form-control" placeholder="Chú thích thêm"/>
            </div>
            <div class="col-1">
                <a href="#" class="text-decoration-none btn-remove-selection-item">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        `;
    }

    removeSelectionItem() {
        $(".btn-remove-selection-item").off(".removeSelectionItem");
        $(".btn-remove-selection-item").on(
            "click.removeSelectionItem",
            function (e) {
                e.preventDefault();
                let items = $(".selection-item").length;
                if (items < 2) {
                    return;
                }
                $(this)
                    .parents(".selection-item")
                    .remove();
            }
        );
    }

    collectAttributeData() {
        let data = [];
        $(".selection-item").each(function () {
            let rowData = {};
            rowData.value = $(this)
                .find(".selection-item-value")
                .val();
            rowData.id = $(this)
                .find(".selection-item-id")
                .val();
            data.push(rowData);
        });
        return data;
    }
}

export class productCore {
    constructor(productId = null) {
        this.productId = productId
        this.unformatPriceAtSubmit()
    }

    unformatPriceAtSubmit() {
        $(".touch-product-form").off("submit.unformatPriceAtSubmit")
        $(".touch-product-form").on("submit.unformatPriceAtSubmit", function (e) {
            const currentPrice = $("input[name=price]").val()
            $("input[name=price]").val(accounting.unformat(currentPrice))
        })
    }

    getSelectedAttributeOption() {
        let result = [];
        const selectedAttribute = $('input[data-name=attribute]:checked')

        selectedAttribute.each(function (index, element) {
            const selectedOption = $(this).parents('tr').find("select[data-name=attribute-option]").val()
            result = _.concat(result, selectedOption)
        })
        return result
    }

    validateMakeVariation() {
        if (this.getSelectedAttributeOption().length) {
            $(".btn-make-variation").prop("disabled", false)
        } else {
            $(".btn-make-variation").prop("disabled", true)
        }
        return;
    }

    setVariantButtonStatus() {
        let _this = this
        $('select[data-name=attribute-option]').on('changed.bs.select.setVariantButtonStatus', function () {
            _this.validateMakeVariation()
        });
        $('input[data-name=attribute]').on('change.setVariantButtonStatus', function () {
            _this.validateMakeVariation()
        });
    }

    makeVariation() {
        let _this = this
        $('.btn-make-variation').on("click.btnMakeVariation", function (e) {
            e.preventDefault()

            let makeVariationUrl = $(this).attr("data-href")
            let makeVariationData = _this.getSelectedAttributeOption()
            Swal.showLoading();

            $.ajax({
                url: makeVariationUrl,
                method: "POST",
                data: {
                    attribute_options: makeVariationData
                },
                success: function (resolve) {
                    swalWithSuccessConfirmButton.fire({
                        title: "Thành công!",
                        type: "success",
                        text: "Tạo biến thể thành công!",
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false,
                    });
                    $("#variant-table").DataTable().draw();

                }
            })

        })
    }

    renderSelectedAttribute(checkedIds) {
        $.ajax({
            url: '/admin/products/fetch-option',
            method: "POST",
            data: {
                checked_ids: checkedIds
            },
            success: function (scs) {
                $(".product-attribute-option").html(scs)
                $(".attribute-selectpicker").selectpicker()
                $("#selectProductAttributeModal").modal("hide")
            }
        })
    }

    submitData() {
        let _this = this
        $(".btn-submit-data").on("click.submitData", function (e) {
            e.preventDefault();
            $("input[name=price]").val(accounting.unformat($(".price-input").val()))
            $('.form-main').submit()
        });
    }

    selectCategory() {
        let _this = this
        $('.category-selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            _this.renderAttributeOptions($(this).val())
        });

    }

    renderAttributeOptions(categoryId) {
        let url = '/admin/products/fetch-attribute-option'
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                category_id: categoryId
            },
            success: function (scs) {
                $("#selectProductAttributeModal").find(".modal-body").html(scs)
            }
        })
    }

    makeVariantProductOrderable() {
        let variantTableData = $(".variant-sort")
        let variantSortUrl = variantTableData.attr('data-href')

        variantTableData.sortable({
            handle: ".connect",
            placeholder: "ui-state-highlight",
            forcePlaceholderSize: true,
            update: function (event, ui) {
                let sort = $(this).sortable("toArray");
                $.ajax({
                    url: variantSortUrl,
                    method: "POST",
                    data: {
                        sort: sort
                    },
                    error: function (err) {
                        if (err.status === 403) {
                            Swal.fire({
                                title: "Lỗi!",
                                type: "error",
                                confirmButtonClass: "btn btn-danger",
                                buttonsStyling: false,
                                html:
                                    "\
                                    <p>Bạn không đủ quyền hạn để thực hiện hành động này. Mọi thay đổi sẽ không được lưu lại.</p>\
                                    <hr>\
                                    <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                            }).catch(swal.noop);
                        }
                    }
                });
            }
        });
    }

    initEditVariantFormData(anchor) {
        const _this = this
        $("#variant-edit-modal").off('show.bs.modal')
        $("#variant-edit-modal").on('show.bs.modal', function (e) {
            const source = $(e.relatedTarget)
            const editVariantUrl = source.data('href')
            const _modal = $(this)
                $.ajax({
                    url: editVariantUrl,
                    success: (resolve) => {
                        _modal.find(".modal-body").html(resolve)
                        $(".price-format").simpleMoneyFormat()
                        _this.updateVariantInfo()
                    }
                })

        })

        $("#variant-edit-modal").off('hide.bs.modal')
        $("#variant-edit-modal").on('hide.bs.modal', function (e) {
            $(anchor).DataTable().draw('page');
        })
    }

    updateVariantInfo() {
        $(".btn-submit-variant-edit").off("click.initEditVariantFormData")
        $(".btn-submit-variant-edit").on("click.initEditVariantFormData", function (e) {
            e.preventDefault()
            const updateVariantUrl = $("#variant-edit-modal").find('input[name=variant_update_url]').val()
            let formData = new FormData();
            formData.append('name', $("input[name=variant_name]").val());
            formData.append('price', accounting.unformat($("input[name=variant_price]").val()));
            formData.append('sku', $("input[name=variant_sku]").val());
            formData.append('quantity', $("input[name=variant_quantity]").val());
            if ($("input[name=variant_is_public]:checked").val()) {
                formData.append('is_public', $("input[name=variant_is_public]:checked").val());
            }
            if ($("input[name=variant_avatar]")[0].files[0]) {
                formData.append('avatar', $("input[name=variant_avatar]")[0].files[0]);
            }
            formData.append('_method', 'PUT')

            $.ajax({
                url: updateVariantUrl,
                data: formData,
                method: "POST",
                contentType: false,
                processData: false,
                success: function (resolve) {
                    $("#variant-edit-modal").modal('hide')
                }
            })
        })
    }

    deleteVariant() {
        let _this = this
        $(".btn-delete-variant").off("click.deleteVariant")
        $(".btn-delete-variant").on("click.deleteVariant", function (e) {
            e.preventDefault()
            let deleteUrl = $(this).attr("data-href")

            Swal.fire({
                title: 'Xóa biến thể',
                text: 'Bạn có chắc chắn muốn thực hiện hành động này?',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy',
                confirmButtonColor: '#d33'
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: deleteUrl,
                        method: "POST",
                        data: {
                            _method: 'DELETE'
                        },
                        success: function (resolve) {
                            Swal.fire(
                                'Thành công!',
                                'Đã xóa biến thể chỉ định',
                                'success'
                            )
                            $(".product-variants-list").html(resolve)
                        }
                    })
                }
            })
        })
    }

    initDatatablesForVariant() {
        const anchor = "#variant-table";
        const fetchUrl = $(anchor).data('list');
        const reorderUrl = $(anchor).data('reorder');
        const _this = this
        $(anchor).DataTable({
            ordering: false,
            searching: true,
            processing: false,
            serverSide: true,
            ajax: {
                url: fetchUrl,
            },
            columnDefs: [
                {
                    render: function (data, type, row) {
                        return accounting.formatMoney(data, "", 0) + " đ"
                    },
                    targets: 3
                },
            ],
            columns: [
                {
                    className: 'connect rowlink-skip',
                    data: null,
                    searchable: false,
                    render: function (data) {
                        return `
                            <i class="material-icons" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">format_line_spacing</i>
                        `
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    className: 'text-right',
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    className: 'text-right',
                    data: 'price',
                    name: 'price'
                },
                {
                    data: null,
                    orderable: false,
                    className: 'rowlink-skip text-right',
                    render: function (data) {
                        return `
                            <div class="btn-group">
                                <a href="#variant-edit-modal" data-toggle="modal" data-href="${data.route.edit}" class="btn btn-sm p-1 p-0">
                                    <i class="material-icons">border_color</i>
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
                $(`${anchor} tbody`).rowlink()
                $('[data-toggle="tooltip"]').tooltip()
                deleteSingleItem()
                _this.initEditVariantFormData(anchor);
                makeTableOrderable(reorderUrl, `${anchor} tbody`)
            }
        });
    }
}

export class productCategoriesCore {
    constructor() { }

    collectSelectedAttribute() {
        let _this = this
        $(".btn-submit-select-product-attribute").on("click.collectSelectedAttributeId", function (e) {
            e.preventDefault()
            let checked = []
            $(".select-attribute-input:checked").each(function () {
                checked.push({
                    id: $(this).val(),
                    value: $(this).attr('data-name')
                })
            })

            _this.renderSelectedAttribute(checked)

            return
        })
    }

    renderSelectedAttribute(checkedIds) {
        let template = "";
        _.forEach(checkedIds, function (item) {
            template += `
            <div class="form-group">
                <input type="hidden" name="product_attributes[]" class="form-control" value="${item.id}" readonly />
                <input type="text" name="" class="form-control" value="${item.value}" readonly />
            </div>
            `
        })

        $(".product-attribute-option").html(template)
        $("#selectProductAttributeModal").modal("hide")
    }
}
