import { productCategoriesCore } from './admin.core'

$(document).ready(function() {
    let guide = new productCategoriesCore()

    guide.collectSelectedAttribute();
})
