<div class="alert alert-danger d-none"></div>
<form action="{{ route('admin.settings.update', $setting->id) }}">
    @method('PUT')
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Tên hiển thị @importantfield:</label>
        <input type="text" class="form-control" name="display_name" value="{{ $setting->display_name }}">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Khoá @importantfield:</label>
        <input type="text" class="form-control" name="key" value="{{ $setting->key }}">
    </div>
    <div class="form-group">
            <label for="message-text" class="col-form-label">Giá trị @importantfield:</label>
            <textarea class="form-control" name="value">{{ $setting->value }}</textarea>
        </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Chi tiết:</label>
        <textarea class="form-control" name="details">{{ $setting->details }}</textarea>
    </div>
</form>
