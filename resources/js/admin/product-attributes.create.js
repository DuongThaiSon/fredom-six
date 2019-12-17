import { productAttributeCore } from './admin.core';

$(document).ready(function() {
    let guide = new productAttributeCore()
    guide.conditionToggleSelectZone()
    if ($(".selection-item").length < 1) {
        guide.addSelectionItem()
    } else {
        guide.removeSelectionItem()
    }
    $("input[name=can_select]").on("change.conditionToggleSelectZone", function() {
        guide.conditionToggleSelectZone()
    })
    $(".btn-add-selection-item").on("click.addSelectionItem", function(e) {
        e.preventDefault()
        guide.addSelectionItem()
    })
    guide.submitData()
    guide.applyAttributeType()
})
