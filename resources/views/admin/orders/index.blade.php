@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('Order')])
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
                    <th style="width: 34.4px;">
                      <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                        <i class="material-icons text-muted">check_box_outline_blank</i>
                      </a>
                    </th>
                    <th class="text-center">ID</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>TỔNG SỐ LƯỢNG SẢN PHẨM</th>
                    <th>GIÁ TRỊ</th>
                    <th style="width: 120px;">THỜI GIAN ĐẶT HÀNG</th>
                    <th>TRẠNG THÁI</th>
                    <th style="width: 160px;">Thao tác</th>
                    
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
                    <td>{{ $item->total_quantity }}</td>
                    <td>{{ number_format($item->total_price) }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="In">
                              <i class="material-icons">print</i>
                            </a>
                            <a href="{{ route('admin.orders.edit', $item->id) }}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sủa">
                              <i class="material-icons">mode_edit</i>
                            </a>
                            <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Xóa">
                              <i class="material-icons">delete</i>
                            </a>
                          </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
              <!-- Pagination -->
              {{ $orders->links() }}
            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection