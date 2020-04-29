@extends('admin.layouts.main', ['activePage' => 'cart', 'title' => __('Order')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ ĐƠN HÀNG</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
            </div>

            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="table">
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th>
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th class="text-center">ID</th>
                            <th>TÊN</th>
                            <th>SĐT</th>
                            <th>ĐỊA CHỈ</th>
                            <th>EMAIL</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ TRỊ</th>
                            <th>THỜI GIAN ĐẶT HÀNG</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <tbody class="sort">
                        @foreach ($orders as $item)
                        <tr>
                            <td class="text-center">
                                <label class="container">
                                    <input type="checkbox" class="checkdel">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $item->id }}</td>
                            <td class="editname">
                                <a href="#">{{ $item->first_name.' '.$item->last_name }}</a>
                            </td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            <td>{{ number_format($item->total_price) }}&nbsp;đ</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                  <a href="{{ route('admin.orders.edit', $item->id) }}" class="btn btn-sm p-1"
                                      data-toggle="tooltip" title="Chi tiết">
                                      <i class="material-icons">visibility</i>
                                  </a>
                                  <form class="mt-0 pt-0" action="{{route('admin.orders.destroy', $item->id)}}" method="POST">
                                      @method('DELETE')
                                      @csrf

                                      <button class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá" type="submit">
                                          <i class="material-icons">delete</i>
                                      </button>
                                  </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
