@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('Add User')])
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
              <form action="{{ route('user.postadd') }}" class="mb-0 p-4 pt-5" id="user-info" method="POST" enctype="multipart/form-data">
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
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Mật khẩu"
                        required
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Phone Number</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="phone"
                        placeholder="Số điện thoại"
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Email</label
                      ><div class="alert" id="check-email" style="max-width: 490px; display:none"></div>
                      <input
                        type="email"
                        class="form-control"
                        id="check"
                        name="email"
                        placeholder="abc@gmail.com"
                        required
                      />
                      
                    </div>
                    <div class="form-group">
                      <label class="control-label"
                        >Address</label
                      >
                      <input
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
                        type="date"
                        class="form-control"
                        name="birthday"
                        placeholder="Sinh nhật"
                      />
                      
                    </div>
                    <div class="form-group d-flex" style="max-width: 490px;">
                        <button type="submit" href="#" class="btn ml-auto btn-primary flex-right">Save</button>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="{{ asset('assets/admin') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('assets/admin') }}/js/main.js"></script>
    <script>
    $("#menu-admin-user").addClass("show");
    $(document).ready(function(){
      
        $("#check").blur(function(){
          $.ajax({
          url: "/admin/check-user",
          type: "post",
          data: {email : $("#check").val()},
          success: function(result){
                if(result == '1'){
                $("#check-email").css({"display":"block"}).html("Email đã được đăng kí").addClass('alert-danger').removeClass('alert-success');
                }else{
                $("#check-email").css({"display":"none"}).removeClass('alert-danger');
                }
            }
          });
        });

    });
    </script>
@endsection