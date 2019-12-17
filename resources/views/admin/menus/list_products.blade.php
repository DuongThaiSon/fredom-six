<div class="table-responsive bg-white mt-4" id="table">
    <div class="row">
        <div class="col-6 input-group">
            <input type="text" id="keyword" name="keyword" class="form-control search-input" placeholder="Tìm kiếm..."
                aria-label="Search for..." value="">
        </div>
    </div>
    <table id="table-show-record" class="table-sm table-hover table mb-2" width="100%">
        <thead>
            <tr class="text-muted">
                <th>ID</th>
                <th>TÊN SẢN PHẨM</th>
                <th>TÊN MỤC</th>
                <th>THAO TÁC</th>
            </tr>
        </thead>
        <tbody class="product-table-body">
            @forelse ($results as $product)
            <tr class="product-item">
                <td>{{ $product->id }}</td>
                <td class="choose-record" data-id="{{ $product->id }}">{{ $product->name }}</td>
                <th>{{ $product->categories->first()->name ?? ''}}</th>
                <td>
                    <div class="btn-group">
                        <a class="btn-sm btn-success choose-record" href="#" data-id="{{ $product->id }}"
                            class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug={{ $product->slug }}>
                            <i class="material-icons">radio_button_checked</i> Chọn
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
