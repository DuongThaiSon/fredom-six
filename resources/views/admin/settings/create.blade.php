<div class="alert alert-danger d-none"></div>
<form action="{{ route('admin.settings.store') }}">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Tên hiển thị @importantfield:</label>
        <input type="text" class="form-control" name="display_name">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Khoá @importantfield:</label>
        <input type="text" class="form-control" name="key">
    </div>
    <div class="form-group">
            <label for="message-text" class="col-form-label">Giá trị @importantfield:</label>
            <textarea class="form-control" name="value"></textarea>
        </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Chi tiết:</label>
        <textarea class="form-control" name="details"></textarea>
    </div>
</form>
