@extends('admin.layouts.main', ['activePage' => 'article', 'title' => __('List Articles')])
@section('content')
<div id="main-content">
    <!-- Search Group Button -->
    {{-- <form action="#" method="get"> --}}
        <div class="search-button-group">
            <form action="{{ Route('admin.articles.search')}}" method="GET" class="">
                <button class="material-icons text-secondary">
                    search
                </button>
                <input class="form-control form-control-sm bg-white" name="name" type="text" placeholder="Search" aria-label="Search" />
                <span class="input-group-append">
                    <button class="btn btn-white pt-1" data-toggle="collapse" type="button" href="#advancesearch">
                        <i class="material-icons text-secondary" title="Tìm kiếm nâng cao" data-toggle="tooltip">expand_more</i>
                    </button>
                </span>
                <div class="row collapse" id="advancesearch">
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Mục</label>
                            <select id="category_id" name="category_id" class="form-control search-change p-2">
                                <option value="">
                                @include('admin.partials.categories_options', ['level'=>0])
                            </select>
                        </div>

                        <div class="form-group col">
                            <label>Người tạo</label>
                            <select name="created_by" class="form-control search-change p-2">
                                    <option value="">
                                @forelse ($users as $user)
                                    <option value="{{ $user->id ?? '' }}">
                                        {{ $user->name??'' }}
                                    </option>
                                @empty

                                @endforelse
                            </select>
                        </div>

                        <div class="form-group col">
                            <label>Từ ngày</label>
                            <input id="to_date" name="to_date" type="text" class="form-control datepicker search-change p-2" />
                        </div>

                        <div class="form-group col">
                            <label>Đến ngày</label>
                            <input id="from_date" name="from_date" type="text" class="form-control datepicker search-change p-2" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    {{-- </form> --}}
    <!-- End Search Group Button -->

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
            </div>

            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="table">
                @csrf
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th></th>
                            <th class="text-center">
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mục</th>
                            <th style="width: 40px;">Hiển thị</th>
                            <th style="width: 40px;">Nổi bật</th>
                            <th style="width: 40px;">Mới</th>
                            <th style="width: 120px;">Ngày tạo</th>
                            <th style="width: 120px;">Người đăng</th>
                            <th style="width: 160px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @foreach ($articles as $article )
                        <tr id="item_{{$article->id}}" class="ui-state-default">
                            <td class="text-muted connect" data-toggle="tooltip"
                                title="Giữ icon này kéo thả để sắp xếp">
                                <i class="material-icons">format_line_spacing</i>
                            </td>
                            <td class="text-center">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""
                                            data-id="{{ $article->id }}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>{{$article->id}}</td>
                            <td class="editname">
                                <a href="{{route('admin.articles.edit', $article->id)}}">{{$article->name}}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.article-cats.edit', $article->category_id)}}">{{$article->category->name??''}}</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm p-1 btn-update-view-status" title="{{ $article->is_public?'Click để tắt':'Click để bật' }}"
                                    data-id="{{ $article->id }}"
                                    data-value="{{ $article->is_public }}"
                                    data-field="is_public"
                                    data-toggle="tooltip" >
                                    <i class="material-icons {{ $article->is_public?'text-primary':'' }}">{{ $article->is_public?'check_circle_outline':'highlight_off' }}</i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm p-1 btn-update-view-status" title="{{ $article->is_highlight?'Click để tắt':'Click để bật' }}"
                                    data-id="{{ $article->id }}"
                                    data-value="{{ $article->is_highlight }}"
                                    data-field="is_highlight"
                                    data-toggle="tooltip" >
                                    <i class="material-icons {{ $article->is_highlight?'text-primary':'' }}">{{ $article->is_highlight?'check_circle_outline':'highlight_off' }}</i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm p-1 btn-update-view-status" title="{{ $article->is_new?'Click để tắt':'Click để bật' }}"
                                    data-id="{{ $article->id }}"
                                    data-value="{{ $article->is_new }}"
                                    data-field="is_new"
                                    data-toggle="tooltip" >
                                    <i class="material-icons {{ $article->is_new?'text-primary':'' }}">{{ $article->is_new?'check_circle_outline':'highlight_off' }}</i>
                                </button>
                            </td>
                            <td>{{$article->created_at}}</td>
                            <td>{{$article->user->name ?? ''}}</td>
                            <td>
                                <div class="btn-group">

                <!-- TABLE -->
                <div class="table-responsive bg-white mt-4" id="cat_table">
                    @csrf
                    <table class="table-sm table-hover table mb-2" width="100%">
                        <thead>
                            <tr class="text-muted">
                                <th></th>
                                <th class="text-center">
                                    <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                        <i class="material-icons text-muted">check_box_outline_blank</i>
                                    </a>
                                </th>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Mục</th>
                                <th style="width: 40px;">Hiển thị</th>
                                <th style="width: 40px;">Nổi bật</th>
                                <th style="width: 40px;">Mới</th>
                                <th style="width: 120px;">Ngày tạo</th>
                                <th style="width: 120px;">Người đăng</th>
                                <th style="width: 160px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="sort">
                            @foreach ($articles as $article )
                            <tr id="item_{{$article->id}}" class="ui-state-default">
                                <td class="text-muted connect" data-toggle="tooltip"
                                    title="Giữ icon này kéo thả để sắp xếp">
                                    <i class="material-icons">format_line_spacing</i>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="checkdel" name=id[] value="{{$article->id}}" delid="{{$article->id}}" />
                                </td>
                                <td>{{$article->id}}</td>
                                <td class="editname">
                                    <a href="{{route('admin.articles.edit', $article->id)}}">{{$article->name}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.article-cats.edit', $article->category_id)}}">{{$article->category()->first()->name??''}}</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-public" curentid="{{$article->id}}" value="{{$article->is_public}}"  data-toggle="tooltip"  title="{{ $article->is_public==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon">{{isset($article)&&$article->is_public==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-highlight"  curentid="{{$article->id}}" value="{{$article->is_highlight}}"  data-toggle="tooltip" title="{{ $article->is_highlight==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon">{{isset($article)&&$article->is_highlight==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-new" curentid="{{$article->id}}" value="{{$article->is_new}}" data-toggle="tooltip" title="{{ $article->is_new==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon">{{isset($article)&&$article->is_new==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>{{$article->created_at}}</td>
                                <td>{{$article->user()->first()->name}}</td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                                            title="Sửa">
                                            <i class="material-icons">border_color</i>
                                        </a>
                                        <a href="{{ route('admin.articles.create') }}?id={{ $article->id }}" class="btn btn-sm p-1 btn-copy" data-id="{{$article->id}}" data-toggle="tooltip" title="Copy dữ liệu">
                                            <i class="material-icons">file_copy</i>
                                        </a>

                                        <a class="btn btn-sm p-1 move-top-button" article-id="{{$article->id}}" data-toggle="tooltip" title="Đưa lên đầu tiên">
                                            <i class="material-icons">call_made</i>
                                        </a>
                                    <a href="{{route('admin.articles.delete', $article->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $articles->links() }}

                </div>

                <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                    class="float-right mt-4">
                    <i class="material-icons">
                        help_outline
                    </i>
                </a>
            </div>
        {{-- </form> --}}
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        core.makeTableOrderable('/admin/articles/sort');
        core.initCheckboxButton();
        core.updateViewViewStatus('/admin/articles/update-view-status');
        /**sort**/
        // let sortableOptions = {
        //     handle: ".connect",
        //     placeholder: "ui-state-highlight",
        //     forcePlaceholderSize: true,
        //     update: function () {
        //         let sort = $(this).sortable("toArray");
        //         console.log(sort);
        //         $.ajax({
        //             method: 'POST',
        //             url: '/admin/articles/sort',
        //             data: {
        //                 sort: sort
        //             },
        //             success: function () {
        //                 alert('SORTED');
        //             }
        //         });
        //     }
        // }
        // $(".sort").sortable(sortableOptions);

        /**Button public**/
        $(".click-public").click(function() {
           let value = $(this).parents(".ui-state-default").find(".click-public").attr("value");
           let id = $(this).parents(".ui-state-default").find(".click-public").attr("curentid");
            $.ajax({
                method: 'POST',
                url: '/admin/articles/change-is-public',
                data: {
                value : value,
                id : id
                },
                success: function(data){

                },
            });
        });
                /**Button highlight**/
        $(".click-highlight").click(function() {
                let value = $(this).parents(".ui-state-default").find(".click-highlight").attr("value");
                let id = $(this).parents(".ui-state-default").find(".click-highlight").attr("curentid");
            $.ajax({
                method: 'POST',
                url: '/admin/articles/change-is-highlight',
                data: {
                value : value,
                id : id
                },
                success: function(data){

                },
            });
        });
                /**Button new**/
        $(".click-new").click(function() {
                let value = $(this).parents(".ui-state-default").find(".click-new").attr("value");
                let id = $(this).parents(".ui-state-default").find(".click-new").attr("curentid");
            $.ajax({
                method: 'POST',
                url: '/admin/articles/change-is-new',
                data: {
                value : value,
                id : id
                },
                success: function(data){

                },
            });
        });
    });
</script>
@endpush
