<div class="table-responsive bg-white mt-4" id="table">
    <div class="row">
        <div class="col-6 input-group">
            <input type="text" id="keyword" name="keyword" class="form-control search-input" placeholder="Tìm kiếm..." aria-label="Search for..." value="">
        </div>
    </div>
    <table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">
        <thead>
            <tr class="text-muted">
                <th>ID</th>
                <th>TÊN BÀI VIẾT</th>
                <th>TÊN MỤC</th>
                <th>THAO TÁC</th>
            </tr>
        </thead>
        <tbody class="article-table-body">
            @forelse ($results as $article)
            <tr class="article-item">
                <td>{{ $article->id }}</td>
                <td class="choose-record" data-id="{{ $article->id }}">{{ $article->name }}</td>
                <th>{{ $article->category->name ?? ''}}</th>
                <td>
                    <div class="btn-group">
                        <a class="btn-sm btn-success choose-record" href="#" data-id="{{ $article->id }}"
                            class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug="{{ $article->slug }}"
                            data-type="article">
                            <i class="material-icons">radio_button_checked</i><span style="padding-left:5px">Chọn</span>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
                <div class="alert alert-danger text-center">Không có dữ liệu!</div>
            @endforelse
        </tbody>
    </table>
    {{ $results->links() }}
</div>
