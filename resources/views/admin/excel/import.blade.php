@extends('admin.layouts.main', ['activePage' => 'Upload-products-excel', 'title' => __('Upload products excel')])
@section('content')
<div id="main-content">
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Chọn file excel để upload sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ route('admin.excel.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control" required>
                    <br>
                    <button class="btn btn-dark">Upload file</button>
                    <a class="btn btn-dark" href="{{ route('admin.excel.export') }}">Download</a>
                    <a class="btn btn-dark" href="{{ asset('excel') }}/update_product.xlsx">File Mẫu</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection