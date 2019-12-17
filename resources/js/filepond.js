import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);

export function initFilePond(inputId, rootUrl) {
    const inputElement = document.getElementById(inputId);
    const pond = FilePond.create( inputElement );
    pond.setOptions({
        allowMultiple: true,
        maxFiles: 10,
        required: true,
        server: {
            url: rootUrl,
            process: {
                url: '/process',
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': `${window.csrfToken}`,
                    'Accept': 'application/json'
                },
                timeout: 7000,
                onload: null,
                onerror: null,
                ondata: null
            }
        }
    });
}
