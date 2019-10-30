import { productAttributeCore } from './admin.core';

$(document).ready(function() {
    let guide = new productAttributeCore()
    guide.conditionToggleSelectZone()
    guide.addSelectionItem()
    $("input[name=can_select]").on("change.conditionToggleSelectZone", function() {
        guide.conditionToggleSelectZone()
    })
    $(".btn-add-selection-item").on("click.addSelectionItem", function(e) {
        e.preventDefault()
        guide.addSelectionItem()
    })
    guide.submitData()
})
