@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('User')])
@section('content')
        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">QUẢN LÝ THÀNH VIÊN</h1>
              <!-- Save group button -->
              <form method="POST" action="{{ route('user.deleteAll') }}">
                @csrf
                  <div class="save-group-buttons">
                      <a
                        class="btn btn-sm btn-dark"
                        data-toggle="tooltip"
                        title="Thêm thành viên mới"
                        href="{{ route('user.add')}}"
                      >
                        <i class="material-icons">
                          note_add
                        </i>
                      </a>
                    <button
                      data-toggle="tooltip"
                      title="Xóa toàn bộ mục đã chọn"
                      class="btn btn-sm btn-dark"
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
                          <th style="width: 30px;">
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
                          <th style="width: 24px;">ID</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Vai trò quản trị</th>
                          <th class="text-center" style="width: 144px;">
                            THAO TÁC
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(Session::has('fail'))
                          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                          @endif
                          @if(Session::has('win'))
                          <div class="alert alert-success">{{ Session::get('win') }}</div>
                          @endif
                        @forelse ($users as $user)
                        <tr>
                            <td class="text-center">
                                <label class="container">
                                    <input type="checkbox" name="id[]" class="checkdel" value="{{ $user->id }} ">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td></td>
                            <td class="text-center">
                              <a href="{{ route('user.add',$user->id ) }}" data-toggle="tooltip" title="Sửa"
                                ><i class="material-icons">border_color</i></a
                              >
                              <a @if(Auth::user()->id==$user->id)href="#"@else href="{{ route('user.delete' ,$user->id) }}"@endif data-toggle="tooltip" title="Xóa"
                                ><i class="material-icons">delete</i></a
                              >
                            </td>
                          </tr>
                        @empty
                            
                        @endforelse
                      </tbody>
                    </table>
                  </div>
              </form>
              <div>
                {{ $users->links() }}
              </div>
              <a
                href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc"
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
    <script>
      $("#menu-admin-user").addClass("show");
      $(".toggle-icon").click(function() {
        if ($(this).text() == "check_circle_outline") {
          $(this)
            .text("highlight_off")
            .removeClass("text-primary");
        } else {
          $(this)
            .text("check_circle_outline")
            .addClass("text-primary");
        }
      });
    </script>
  @endsection