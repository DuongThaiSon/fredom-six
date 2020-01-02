<div class="form-group">
    <label>Danh mục <span class="text-red">*</span></label>
    <select id="menu-category" class="form-control selectpicker show-tick mt-4 menu-category" data-style="btn-dark" data-size="5" data-live-search="true" title="{{ count($categories) ? 'Mời bạn chọn danh mục' : 'Không có danh mục nào' }}" required>
        @include('admin.menus.categories_option', ['level' => 0])
    </select>
</div>
