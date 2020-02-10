$(document).ready(function () {
    let orderUrl = $("#table").data('reorder');
    let destroyManyUrl = $("#table").data('destroy-many');
    core.makeTableOrderable(orderUrl);
    core.initCheckboxButton();
    core.deleteMultipleItems(destroyManyUrl);
    core.deleteSingleItem();
    // core.updateViewViewStatus(updateViewViewStatus);
});
