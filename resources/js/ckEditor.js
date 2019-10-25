window.ClassicEditor = require( '@ckeditor/ckeditor5-build-classic')
import { ckUploadAdapter } from './ckUploadAdapter';


const ckEditorClassicOptions = {
    heading: {
        options: [
            { model: 'paragraph', title: 'paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4' },
            { model: 'heading5', view: 'h5', title: 'Heading 5' }
        ]
    },
    extraPlugins: [ customUploadAdapterPlugin ]
};

const ckEditorClassicOptionsMin = {
    toolbar: ['bold', 'italic']
};

var allCkEditors = [];
$(document).ready(function() {
    // Initialize All CKEditors
    allCkEditors = [];

    var allHtmlElements = document.querySelectorAll('.ck-classic');
    for (let i = 0; i < allHtmlElements.length; ++i) {
        ClassicEditor
            .create(allHtmlElements[i], ckEditorClassicOptions)
            .then(editor => {
                allCkEditors.push(editor);
            })
            .catch(error => {
                console.error(error);
            });
    }

    // allHtmlElements = document.querySelectorAll('.ck-classic-min');
    // for (let j = 0; j < allHtmlElements.length; ++j) {
    //     ClassicEditor
    //         .create(allHtmlElements[j], ckEditorClassicOptionsMin)
    //         .then(editor => {
    //             allCkEditors.push(editor);
    //         })
    //         .catch(error => {
    //             console.error(error);
    //         });
    // }




});

window.ckEditor = function(name) {
    for (let i = 0; i < allCkEditors.length; i++) {
        if (allCkEditors[i].sourceElement.id === name) return allCkEditors[i];
    }

    return null;
}



function customUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        // Configure the URL to the upload script in your back-end here!
        return new ckUploadAdapter( loader, '/admin/upload-image' );
    };
}
