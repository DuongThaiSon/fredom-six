import { productAttributeCore } from './admin.core';

$(document).ready(function() {
    let guide = new productAttributeCore()
    if ($(".selection-item").length < 1) {
        guide.addSelectionItem()
    } else {
        guide.removeSelectionItem()
    }
    $(".btn-add-selection-item").on("click.addSelectionItem", function(e) {
        e.preventDefault()
        guide.addSelectionItem()
    })
    guide.submitData()
    guide.applyAttributeType()
})
