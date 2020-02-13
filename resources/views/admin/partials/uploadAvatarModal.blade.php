<div class="modal fade upload-avatar-modal" tabindex="-1" role="dialog" aria-labelledby="uploadAvatarModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-right">
                <button type="button" class="close p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="file" id="croppie-select-image" class="d-none" accept=".png, .jpg, .jpeg">
            <div id="croppie-select-image-area">
                <h6 class="m-5 p-5 text-center">
                    Upload a file to start cropping
                </h6>
            </div>
            <div id="croppie-edit-image" class="d-none">
                <div id="croppie-zone"></div>
                <div class="text-right m-4">
                    <button type="submit"
                        class="text-white font-weight-bold btn btn-secondary rounded btn-croppie-cancel text-dark">Cancel</button>
                    <button type="submit"
                        class="text-white font-weight-bold btn btn-primary rounded btn-croppie-save-image">Crop</button>
                </div>
            </div>
            <input type="hidden" id="uploaded-image">
        </div>
    </div>
</div>
