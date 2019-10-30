export class productAttributeCore {
    constructor() {}

    submitData() {
        $(".btn-submit-data").on("click.submitData", function(e) {
            e.preventDefault();
            if (!this.canPassValidateData()) {
                return;
            }

            let attributeData = this.collectAttributeData();

            $.ajax({
                url: "/admin/product-attributes",
                method: "POST",
                data: {
                    name: $("input[name=name]").val(),
                    attribute_values: attributeData,
                    can_select: $("input[name=can_select]").attr("checked"),
                    allow_multiple: $("input[name=allow_multiple]").attr(
                        "checked"
                    )
                }
            });
        });
    }

    canPassValidateData() {
        let validated = true;
        if (_.trim($("input[name=name]").val()).length < 1) {
            validated = false;
        }

        $(".selection-item-value").each(function() {
            if (_.trim($(this).val()) < 1) {
                validated = false;
            }
        });

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
        return `
        <div class="row form-group selection-item">
            <div class="col-10 input-group">
                <input type="hidden" name="id[]" value="${id}" class="form-control selection-item-id"/>
                <input type="text" name="value[]" value="${value}" class="form-control selection-item-value"/>
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
