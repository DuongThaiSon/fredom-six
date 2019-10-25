filePond = require("../filepond");

$(document).ready(function() {
    console.log('lleh');
    let galleryId = $('input[name=id]').val();

    filePond.initFilePond('gallery-images', `/admin/gallery/${galleryId}`);
});
