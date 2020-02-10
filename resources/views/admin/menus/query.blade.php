<input type="hidden" id="listArticleCategories" value="{{ route('admin.menus.listArticleCategories') }}">
<input type="hidden" id="showArticleCategory" value="{{ route('admin.menus.showArticleCategory') }}">
<input type="hidden" id="listProductCategories" value="{{ route('admin.menus.listProductCategories') }}">
<input type="hidden" id="showProductCategory" value="{{ route('admin.menus.showProductCategory') }}">
<input type="hidden" id="listArticles" value="{{ route('admin.menus.listArticles') }}">
<input type="hidden" id="listArticlesDatatables" value="{{ route('admin.menus.listArticlesDatatables') }}">
<input type="hidden" id="showArticle" value="{{ route('admin.menus.showArticle') }}">
<input type="hidden" id="listProducts" value="{{ route('admin.menus.listProducts') }}">
<input type="hidden" id="listProductsDatatables" value="{{ route('admin.menus.listProductsDatatables') }}">
<input type="hidden" id="showProduct" value="{{ route('admin.menus.showProduct') }}">
<div class="col-lg-12 result-zone">
    @includeWhen(isset($object) && $object, 'admin.menus.selected')
</div>
