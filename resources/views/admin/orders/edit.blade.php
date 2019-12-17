@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Edit Order')])
@section('content')
<!-- Content -->
<div id="main-content">
<div class="container-fluid" style="background: #e5e5e5;">
  <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                <legend>THÔNG TIN ĐƠN HÀNG</legend>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->first_name ??'' }} {{ $order->last_name }}"/>
                        <small class="form-text">Tên người mua hàng</small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->email ??'' }}"/>
                        <small class="form-text">Email khách hàng</small>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->address ??'' }}"/>
                        <small class="form-text">Địa chỉ giao hàng</small>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->phone ??'' }}"/>
                        <small class="form-text">Số điện thoại liên hệ</small>
                    </div>
                    <div class="form-group">
                        <label>Phương thức vận chuyển</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->partner->name ??'' }} : {{ number_format($order->partner->price ?? '0') ??'' }} vnđ"/>
                        <small class="form-text">Phương thức vận chuyển</small>
                    </div>
                    <div class="form-group">
                        <label>Phương thức thanh toán</label>
                        <input type="text" name="name" readonly class="form-control" placeholder="Tên khách hàng" value="{{ $order->payment_choice ??'' }}"/>
                        <small class="form-text">Phương thức thanh toán</small>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="sel1">
                            <option value="Đặt hàng" {{ $order->status == 'Đặt hàng' ? 'selected' : '' }}>Đặt hàng</option>
                            <option value="Đang giao hàng" {{ $order->status == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                        <small class="form-text">Trạng thái </small>
                    </div>
                    <div class="form-group">
                        <label>Giỏ hàng</label>
                        <table class="w-100 table-sm table-hover table mb-2 text-center">
                            <thead>
                                <tr class="text-muted">
                                    <th class="w-5">STT</th>
                                    <th class="w-30">Sản phẩm</th>
                                    <th class="w-15">Màu</th>
                                    <th class="w-15">Kích cỡ</th>
                                    <th class="w-5">Số lượng</th>
                                    <th class="w-15">Giá</th>
                                    <th class="w-15  text-right">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody class="sort">
                                @forelse ($order->cartItems as $cartItem)
                                    <tr>
                                        <td class="w-5">{{ $loop->iteration ??'' }}</td>
                                        <td class="w-30">{{ $cartItem->product->name ??'' }}</td>
                                        <td class="w-15">
                                            {{--  {{ $cartItem->product->variantAttributeValues->firstWhere('product_attribute_id', 2)->note ?? ''}}  --}}
                                        </td>
                                        <td class="w-15">
                                            {{--  {{ $cartItem->product->variantAttributeValues->firstWhere('product_attribute_id', 3)->value ?? ''}}  --}}
                                        </td>
                                        <td class="w-5">{{ $cartItem->quantity }}</td>
                                        <td class="w-15 text-right">{{ number_format($cartItem->price) }}&nbsp;đ</td>
                                        <td class="w-15 text-right">{{ number_format($cartItem->quantity * $cartItem->price) }}&nbsp;đ</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">Không có dữ liệu!</td>
                                    </tr>
                                @endforelse
                                    <tr>
                                        <td colspan="3">Tổng</td>
                                        <td></td>
                                        <td>{{ $order->cartItems->sum('quantity') }}</td>
                                        <td></td>
                                        <td  class="text-right">{{ number_format($order->sum ) }}&nbsp;đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Phí vận chuyển</td>
                                        <td colspan="4" class="text-right">{{ number_format($order->partner->price ?? '0')}}&nbsp;đ</td>
                                    </tr>
                                    <tr style="color: black; font-weight: bold;">
                                        <td colspan="3">Tổng giá trị</td>
                                        <td colspan="4" class="text-right">{{ number_format($order->sum + ($order->partner->price ?? '0')) }}&nbsp;đ</td>
                                    </tr>
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
