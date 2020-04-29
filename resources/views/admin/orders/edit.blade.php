@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Edit Order')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="content">
                <h1 class="my-3 pl-4">Thông tin đơn hàng</h1>
                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <div class="bg-white p-4 pt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" readonly class="form-control"
                                    placeholder="Tên khách hàng"
                                    value="{{ $order->first_name ??'' }} {{ $order->last_name }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="name" readonly class="form-control"
                                    placeholder="Tên khách hàng" value="{{ $order->email ??'' }}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="name" readonly class="form-control"
                                    placeholder="Tên khách hàng" value="{{ $order->address ??'' }}" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="name" readonly class="form-control"
                                    placeholder="Tên khách hàng" value="{{ $order->phone ??'' }}" />
                            </div>
                            <div class="form-group">
                                <label>Giỏ hàng</label>
                                <table class="w-100 table-sm table-hover table mb-2 text-center">
                                    <thead>
                                        <tr class="text-muted">
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sort">
                                        @forelse ($order->cartItems as $cartItem)
                                        <tr>
                                            <td>{{ $loop->iteration ??'' }}</td>
                                            <td>{{ $cartItem->product->name ??'' }}</td>
                                            <td>{{ $cartItem->quantity }}</td>
                                            <td>{{ number_format($cartItem->price) }}&nbsp;đ</td>
                                            <td>{{ number_format($cartItem->quantity * $cartItem->price) }}&nbsp;đ</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100%">Không có dữ liệu!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="cart-total--info mt-5">
                                    <div class="form-group">
                                        <label for="" class="font-larger">Tổng giá trị: </label>
                                        <span class="font-larger">{{ number_format($order->sum + ($order->partner->price ?? '0')) }}&nbsp;đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')

@endpush
