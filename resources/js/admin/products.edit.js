import { productCore } from './admin.core';

$(document).ready(function() {
    let id = $("input[name=id]").val()
    let guide = new productCore(id)
    guide.collectSelectedAttributeId()
    guide.selectCategory()
    $(".attribute-selectpicker").selectpicker()
})
