@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('Contact')])
@section('content')
{{-- <div id="main-content">
    Dashboard
    <button class="btn" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</button>
    <form id="logout" method="POST" action="/admin/logout">
        @csrf
    </form>
</div> --}}

        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ NỘI DUNG LIÊN HỆ TỪ KHÁCH HÀNG</h1>
              <!-- Save group button -->
              <form action="{{ route('contact.deleteAll')}}" method="POST" id="delete-all">
                @csrf
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
              @if(Session::has('win'))
                  <div class="alert alert-success">{{ Session::get('win')}}</div>
                @endif
              <div class="save-group-buttons">
                <button
                  data-toggle="tooltip"
                  title="Xóa toàn bộ mục đã chọn"
                  class="btn btn-sm btn-dark deleteAll-contact"
                  target="_blank"
                  type="submit"
                >
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
                      <th style="width: 35px;">
                        <a
                          id="btn-ck-all"
                          href="#"
                          data-toggle="tooltip"
                          title="Chọn / bỏ chọn toàn bộ"
                        >
                          <i class="material-icons text-muted"
                            >check_box_outline_blank</i
                          >
                        </a>
                      </th>
                      <th>ID</th>
                      <th>Họ tên</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Thời gian gửi liên hệ</th>
                      <th style="width: 40px;">THAO TÁC</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                    @forelse ($contacts as $contact)
                    <tr class="contact">
                        <td class="text-center">
                            <label class="container">
                                <input type="checkbox" class="checkdel" name="id[]" value="{{ $contact->id }}">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td class="text-center">
                          <a href="" class="btn-delete" data-id="{{ $contact->id }}"><i class="material-icons">delete</i></a>
                        </td>
                      </tr>
                    @empty
                        <div class="alert alert-success">Không có liên hệ nào</div>
                    @endforelse
                  
                </tbody>
                </table>
                
              </div>
              </form>
              <div>
                  {{ $contacts->links() }}
                </div>

              <a
                href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                target="_blank"
                class="float-right mt-4"
              >
                <i class="material-icons">
                  help_outline
                </i>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>

   
    
        </div>
      </div>
  </div>
  @endsection
  @push('js')
    <script src="{{ asset('assets/admin') }}/js/contact.js"></script>
  @endpush