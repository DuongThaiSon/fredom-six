@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('User Info')])
@section('content')
        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content" >
              <h1 class="mt-3 pl-4">THÔNG TIN USER</h1>
              <div class="save-group-buttons">

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
              <form action="{{ route('admin.info.change') }}" class="mb-0 p-4 pt-5" id="user-info" method="POST" enctype="multipart/form-data">
                @csrf
                      @if($errors->any())
                          <div class="alert alert-danger">{{ $errors->first() }}</div>
                      @endif
                      @if(Session::has('win'))
                          <div class="alert alert-success">{{ Session::get('win') }}</div>
                      @endif
                <div class="row">
                  <div class="col-5">
                    <legend>ẢNH ĐẠI DIỆN</legend>
                    <div class="form-group">
                        <input
                          type="file"
                          class="form-control"
                          name="avatar"
                          placeholder="Ảnh đại diện"
                        />
                        <small class="form-text"
                          >Ảnh avatar.
                        </small>
                      </div>
                  </div>

                  <div class="col-7">
                    <div class="form-group">
                      <label class="control-label"
                        >ID</label
                      >
                      <input 
                    value="{{ $user->id }}"
                        type="text"
                        class="form-control"
                        name="id"
                        placeholder=""
                        readonly
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Họ tên</label
                      >
                      <input
                    value="{{ $user->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Họ và tên"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Chức vụ</label
                      >
                      <input
                      value="{{ $user->position }}"
                        type="text"
                        class="form-control"
                        name="position"
                        placeholder="Chức vụ"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Vai trò quản trị</label
                      >
                      <select 
                        type="text"
                        class="form-control"
                        name="page_title"
                        placeholder=""
                      >
                    <option value="1">Admin</option>
                    <option value="2">Mod</option>
                    <option value="3">Member</option>
                    </select>
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Password</label
                      >
                      <input
                      value=""
                        type="text"
                        class="form-control"
                        name="password"
                        placeholder="Mật khẩu"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Phone Number</label
                      >
                      <input
                      value="{{ $user->phone }}"
                        type="text"
                        class="form-control"
                        name="phone"
                        placeholder="Số điện thoại"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Email</label
                      >
                      <input
                    value="{{$user->email}}"
                        type="text"
                        class="form-control"
                        name="email"
                        placeholder="abc@gmail.com"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Address</label
                      >
                      <input
                      value="{{$user->address}}"
                        type="text"
                        class="form-control"
                        name="address"
                        placeholder="Địa chỉ"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Skype</label
                      >
                      <input
                      value="{{$user->skype}}"
                        type="text"
                        class="form-control"
                        name="skype"
                        placeholder="Skype"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Birthday</label
                      >
                      <input
                      value="{{$user->birthday}}"
                        type="date"
                        class="form-control"
                        name="birthday"
                        placeholder="Sinh nhật"
                      />
                      
                    </div>
                    <div class="form-group d-flex" style="max-width: 490px;">
                        <button type="submit" class="btn ml-auto btn-primary flex-right">Save</button>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <script>
     $("#menu-admin-user").addClass("show")
     </script>
@endsection
