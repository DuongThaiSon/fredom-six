@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Edit Component')])
@section('content')
<!-- Content -->
<div id="main-content">
<div class="container-fluid" style="background: #e5e5e5;">
  <form method="POST" action="" enctype="multipart/form-data">

    @csrf
  <div id="content">
    <h1 class="mt-3 pl-4">Thông tin bài viết</h1>
    <div class="save-group-buttons">
        <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
          <i class="material-icons">
            save
          </i>
        </button>
        <a
          class="btn btn-sm btn-dark"
          href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
          target="_blank"
        >
          <i class="material-icons">
            help_outline
          </i>
        </a>
        </div>
        <!-- Form -->
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="bg-white p-4 pt-5">
            <div class="row">
                <div class="col-12">
                <legend>THÔNG TIN NỘI DUNG PHỤ</legend>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên khách hàng" value="{{ $order->first_name ??'' }} {{ $order->last_name }}"/>
                        <small class="form-text">Tên người mua hàng</small>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="regions" class="form-control" id="sel1">
                            <option value="" {{ $order->payment_status == 'wait' ? 'selected' : '' }}>Đặt hàng</option>
                            <option value="" {{ $order->payment_status == 'shipping' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="" {{ $order->payment_status == 'done' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                        <small class="form-text">Trạng thái </small>
                    </div>
                    <div class="form-group">
                        <label>Giỏ hàng</label>
                        <table class="w-100 table-sm table-hover table mb-2">
                            <thead>
                                <tr class="text-muted">
                                    <th class="w-25">Sản phẩm</th>
                                    <th class="w-25">Số lượng</th>
                                    <th class="w-25">Giá</th>
                                    <th class="w-25">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody class="sort">
                                @forelse ($order->cartItems as $cartItem)
                                    <tr>
                                        <td>{{ $cartItem->product->name ??'' }}</td>
                                        <td>{{ $cartItem->quantity }}</td>
                                        <td>{{ number_format($cartItem->price) }}</td>
                                        <td>
                                            {{ number_format($cartItem->quantity * $cartItem->price) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">
                                            Không có dữ liệu!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <small class="form-text">Các sản phẩm có trong giỏ hàng</small>
                    </div>
                </div>
            </div>

        <!-- CK Editor -->

        </div>
      </form>
    </div>
  </div>
@endsection
@push('js')

@endpush
