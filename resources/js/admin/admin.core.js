export class productAttributeCore {
    constructor() {}

    applyAttributeType() {
        $("input[name=type]").on("change.applyAttributeType", function() {
            let type = $("input[name=type]:checked").val()
            $(".selection-item-value").attr('type', type)
        })
    }

    submitData() {
        let _this = this
        $(".btn-submit-data").on("click.submitData", function(e) {
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

        if ($("input[name=can_select]").attr("checked")) {
            $(".selection-item-value").each(function() {
                if (_.trim($(this).val()) < 1) {
                    validated = false;
                }
            });
        }

        return validated;
    }

    conditionToggleSelectZone() {
        let checkAttr = $("input[name=can_select]");
        if (checkAttr.attr("checked")) {
            $(".select-zone").removeClass("d-none");
        } else {
            $(".select-zone").addClass("d-none");
        }
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
            function(e) {
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
        $(".selection-item").each(function() {
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
        this.productVariantPagination()

    }

    collectSelectedAttributeId() {
        let _this = this
        $('.attribute-selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            let result = '';
            let selected = $(this).find('option:selected')
            selected.each(function(index, element) {
                result += $(element).text()
                if (index < selected.length - 1) {
                    result += ', '
                }
            })
            $(".selected-value").text(result)
            _this.setVariantButtonStatus()
        });
    }

    makeVariation() {
        $('.btn-make-variation').on("click.btnMakeVariation", function(e) {
            e.preventDefault()
            let makeVariationUrl = $(this).attr("data-href")
            let makeVariationData = $(".attribute-selectpicker").val()
            $.ajax({
                url: makeVariationUrl,
                method: "POST",
                data: {
                    attributes: makeVariationData
                },
                success: function(resolve) {
                    $(".product-variants-list").html(resolve)
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
            success: function(scs) {
                $(".product-attribute-option").html(scs)
                $(".attribute-selectpicker").selectpicker()
                $("#selectProductAttributeModal").modal("hide")
            }
        })
    }

    submitData() {
        let _this = this
        $(".btn-submit-data").on("click.submitData", function(e) {
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
            success: function(scs) {
                $("#selectProductAttributeModal").find(".modal-body").html(scs)
            }
        })
    }

    setVariantButtonStatus() {
        let attributeSelectedCount = $('.attribute-selectpicker').val().length;
        if (attributeSelectedCount) {
            $(".btn-make-variation").attr("disabled", false)
        } else {
            $(".btn-make-variation").attr("disabled", true)
        }

    }

    productVariantPagination() {
        let _this = this
        $(".variant-pagination").find("a.page-link").off("click.productVariantPagination")
        $(".variant-pagination").find("a.page-link").on("click.productVariantPagination", function(e) {
            e.preventDefault()
            let pagingUrl = $(this).attr("href")
            $.ajax({
                url: pagingUrl,
                success: function(resolve) {
                    $(".product-variants-list").html(resolve)
                    _this.productVariantPagination()
                }
            })
            
        })        
    }
}

export class productCategoriesCore {
    constructor() {}

    collectSelectedAttribute() {
        let _this = this
        $(".btn-submit-select-product-attribute").on("click.collectSelectedAttributeId", function(e) {
            e.preventDefault()
            let checked = []
            $(".select-attribute-input:checked").each(function() {
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
        _.forEach(checkedIds, function(item) {
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
