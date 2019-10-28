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
                      <a
                      id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ"
                      >
                        <i class="material-icons text-muted">check_box_outline_blank</i>
                      </a>
                    </th>
                    <th class="text-center">ID</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>TỔNG ĐƠN HÀNG</th>
                    <th style="width: 120px;">THỜI GIAN ĐẶT HÀNG</th>
                    <th style="width: 160px;">Thao tác</th>
                  </tr>
                </thead>
                <tbody class="sort">
                  <tr>
                    <td class="text-center">
                        <label class="container">
                            <input type="checkbox" class="checkdel">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>155</td>
                    <td class="editname">
                      <a href="#">2018-03-26 14:14:32</a>
                    </td>
                    <td>BẾP ĐIỆN TỪ</td>
                    <td>2019-09-09 10:11:45</td>
                    <td>
                        <div class="btn-group">
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="In"
                            >
                            <i class="material-icons">
                              print
                              </i>
                            </a>
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="Sủa"
                            >
                              <i class="material-icons">mode_edit</i>
                            </a>
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="Xóa"
                            >
                              <i class="material-icons">delete</i>
                            </a>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:68px;" class="text-center">
                        <label class="container">
                            <input type="checkbox" class="checkdel">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td style="width:59px;">155</td>
                    <td class="editname">
                      <a href="#">2018-03-26 14:14:32</a>
                    </td>
                    <td>BẾP ĐIỆN TỪ</td>
                    <td>2019-09-09 10:11:45</td>
                    <td>
                        <div class="btn-group">
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="In"
                            >
                            <i class="material-icons">
                              print
                              </i>
                            </a>
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="Copy dữ liệu"
                            >
                              <i class="material-icons">mode_edit</i>
                            </a>
                            <a
                              href="#"
                              class="btn btn-sm p-1"
                              data-toggle="tooltip"
                              title="Đưa lên đầu tiên"
                            >
                              <i class="material-icons">delete</i>
                            </a>
                          </div>
                    </td>
                  </tr>

            
                </tbody>
              </table>

              
            </div>
              <!-- Pagination -->
          <ul class="pagination float-left mt-4">
              <li class="page-item">
                <a class="page-link" style="padding-top:4px;">
                  <i class="material-icons">
                    chevron_left
                  </i>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link">2</a>
              </li>
              <li class="page-item">
                <a class="page-link">...</a>
              </li>
              <li class="page-item">
                <a class="page-link">4</a>
              </li>
              <li class="page-item">
                  <a class="page-link" style="padding-top:4px;">
                      <i class="material-icons">
                        chevron_right
                      </i>
                    </a>
              </li>
            </ul>

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