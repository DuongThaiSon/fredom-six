@extends('admin.layouts.main', ['activePage' => 'articles-index', 'title' => __('List Articles')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Tin bài</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.articles.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Thêm bài viết mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục được chọn" class="btn btn-sm btn-dark"
                    target="_blank" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
                <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc" target="_blank"
                    class="btn btn-sm btn-dark">
                    <i class="material-icons">
                        help_outline
                    </i>
                </a>
            </div>
            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="table" data-reorder="{{ route('admin.articles.reorder') }}"
                data-destroy-many="{{ route('admin.articles.destroyMany') }}"
                data-update-view-status="{{ route('admin.articles.updateViewStatus') }}">
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th width="5%"></th>
                            <th width="3%" class="text-center">
                                <div class="pretty p-icon p-curve p-bigger p-has-indeterminate p-smooth"
                                    style="font-size: 15px">
                                    <input type="checkbox" class="btn-check-all" />
                                    <div class="state p-primary">
                                        <i class="icon material-icons">done</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-is-indeterminate p-primary">
                                        <i class="icon material-icons">remove</i>
                                        <label></label>
                                    </div>
                                </div>
                            </th>
                            <th width="7%">ID</th>
                            <th width="25%">Tên sản phẩm</th>
                            <th width="15%">Mục</th>
                            <th width="5%">Hiển thị</th>
                            <th width="5%">Nổi bật</th>
                            <th width="5%">Mới</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%">Người đăng</th>
                            <th width="10%" class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort" data-link="row" class="rowlink">
                        @forelse ($articles as $article )
                        <tr id="item_{{$article->id}}" class="ui-state-default">
                            <td class="text-muted connect rowlink-skip" data-toggle="tooltip"
                                title="Giữ icon này kéo thả để sắp xếp">
                                <a href="{{route('admin.articles.edit', $article->id)}}">
                                    <i class="material-icons">format_line_spacing</i>
                                </a>
                            </td>
                            <td class="text-center rowlink-skip align-middle">
                                <div class="pretty p-icon p-curve p-smooth">
                                    <input type="checkbox" class="form-check-input" value="{{ $article->id }}"
                                        data-id="{{ $article->id }}" />
                                    <div class="state p-primary">
                                        <i class="icon material-icons">done</i>
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td>{{$article->id}}</td>
                            <td class="editname">
                                <a href="{{route('admin.articles.edit', $article->id)}}">{{$article->name??''}}</a>
                            </td>
                            <td class="rowlink-skip">
                                <a
                                    href="{{route('admin.article-categories.edit', $article->category_id)}}">{{$article->category->name??''}}</a>
                            </td>
                            <td class="rowlink-skip align-middle">
                                <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                    <input type="checkbox" class="btn-update-view-status" data-id="{{ $article->id }}"
                                        {{ $article->is_public ? 'checked' : '' }} name="is_public"
                                        data-toggle="tooltip"
                                        title="{{ $article->is_public ? 'Click để tắt' : 'Click để bật' }}" />
                                    <div class="state p-on p-primary-o">
                                        <i class="icon material-icons">check</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-off">
                                        <i class="icon material-icons">clear</i>
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td class="rowlink-skip align-middle">
                                <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                    <input type="checkbox" class="btn-update-view-status" data-id="{{ $article->id }}"
                                        {{ $article->is_highlight ? 'checked' : '' }} name="is_highlight"
                                        data-toggle="tooltip"
                                        title="{{ $article->is_highlight ? 'Click để tắt' : 'Click để bật' }}" />
                                    <div class="state p-on p-primary-o">
                                        <i class="icon material-icons">check</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-off">
                                        <i class="icon material-icons">clear</i>
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td class="rowlink-skip align-middle">
                                <div class="pretty p-icon p-toggle p-round p-bigger p-smooth">
                                    <input type="checkbox" class="btn-update-view-status" data-id="{{ $article->id }}"
                                        {{ $article->is_new ? 'checked' : '' }} name="is_new" data-toggle="tooltip"
                                        title="{{ $article->is_new ? 'Click để tắt' : 'Click để bật' }}" />
                                    <div class="state p-on p-primary-o">
                                        <i class="icon material-icons">check</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-off">
                                        <i class="icon material-icons">clear</i>
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td>{{$article->created_at}}</td>
                            <td>{{$article->user->name??''}}</td>
                            <td class="rowlink-skip text-right">
                                <div class="btn-group">
                                    <a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-sm p-1"
                                        style="padding:0;" data-toggle="tooltip" title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>
                                    <a href="{{ route('admin.articles.clone', $article->id) }}"
                                        class="btn btn-sm p-1 btn-copy" data-id="{{$article->id}}" data-toggle="tooltip"
                                        title="Tạo bản sao">
                                        <i class="material-icons">file_copy</i>
                                    </a>
                                    <a class="btn btn-sm p-1 btn-move-top"
                                        href="{{ route('admin.articles.moveTop', $article->id) }}" data-toggle="tooltip"
                                        title="Đưa lên đầu tiên">
                                        <i class="material-icons">call_made</i>
                                    </a>
                                    <a href="{{route('admin.articles.destroy', $article->id)}}"
                                        class="btn btn-sm p-1 btn-destroy" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-dark" colspan="11">Không tìm thấy bản ghi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $articles->links() }}
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
@endsection
@push('js')
<script src="/assets/admin/js/articles.index.js"></script>
@endpush
