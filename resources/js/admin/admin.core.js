export class productAttributeCore {
    constructor() {}

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

        console.log(validated);

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
        let element = this.generateSelectionItem();
        $(".selection-list").append(element);
        this.removeSelectionItem();
    }

    generateSelectionItem(id = "", value = "") {
        let index = Date.now()
        return `
        <div class="row form-group selection-item">
            <div class="col-10 input-group">
                <input type="hidden" name="attribute_values[${index}][id]" value="${id}" class="form-control selection-item-id"/>
                <input type="text" name="attribute_values[${index}][value]" value="${value}" class="form-control selection-item-value"/>
                <div class="input-group-prepend">
                    <a href="#" class="text-decoration-none btn-remove-selection-item">
                        <div class="input-group-text bg-white">
                            <i class="material-icons">delete</i>
                        </div>
                    </a>
                </div>
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
        console.log(this.productId);

    }

    collectSelectedAttributeId() {
        let _this = this
        $(".btn-submit-select-product-attribute").on("click.collectSelectedAttributeId", function(e) {
            e.preventDefault()
            let checked = []
            $(".select-attribute-input:checked").each(function() {
                checked.push($(this).val())
            })
            _this.renderSelectedAttribute(checked)
            return
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
}
