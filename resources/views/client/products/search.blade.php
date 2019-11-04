@extends('client.layouts.main', ['title' => __('Product Search')])
@section('content')
    <!-- breadcrumb -->
    <div class="bread-crumb">
        <div class="row" style="background: #ebebeb;">
          <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a class="active" href="#">Sản phẩm nữ</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <!-- showcase -->
      <div id="showcase" style="height: 645px; overflow: hidden;">
        <img src="/assets/client/img/contact-img/leatherBag.png" style="width: 100%; background-position: top;" alt="">
      </div>
    
    <!-- product -->
    <section id="product-option">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <div class="options">
              <ul class="nav">
                <li class="text-muted">Bộ lọc</li>
                <li class="options-list font-weight-bold">Phong cách <i class="fas fa-caret-down"></i></li>
                <li class="options-list font-weight-bold">Màu sắc <i class="fas fa-caret-down"></i></li>
                <li class="options-list font-weight-bold">Kích cỡ <i class="fas fa-caret-down"></i></li>
                <li class="options-list font-weight-bold">Độ cao <i class="fas fa-caret-down"></i></li>
                <li class="options-list font-weight-bold">Kiểu gót <i class="fas fa-caret-down"></i></li>
                <li class="options-list font-weight-bold">Kiểu mũi <i class="fas fa-caret-down"></i></li>
              </ul>
              <div class="checkbox-option p-3">
                  <div class="all-options d-flex">
                    <!-- styles -->
                    <div class="style-options d-flex flex-column">
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Văn phòng" />
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">Văn phòng</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Đường phố">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">Đường phố</span>
                      </label>
    
                      {{-- <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Evening">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">Evening</span>
                      </label> --}}
                    </div>
                    <!-- colors -->
                    <div class="color-options">
                      <div class="row">
                        <div class="color" style="background: #000000"></div>
                        <div class="color" style="background: #ffffff"></div>
                        <div class="color" style="background: #d2dae2"></div>
                        <div class="color" style="background: #f0dadc"></div>
                      </div>
                      <div class="row">
                        <div class="color" style="background: #02306b"></div>
                        <div class="color" style="background: #025246"></div>
                        <div class="color" style="background: #d40210"></div>
                        <div class="color" style="background: #f55678"></div>
                      </div>
                      <div class="row">
                        <div class="color" style="background: #a36841"></div>
                        <div class="color" style="background: #ffa733"></div>
                      </div>
                    </div>
                    <!-- sizes -->
                    <div class="size-options">
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="34">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">34</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="35">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">35</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="36">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">36</span>
                      </label>
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="37">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">37</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="38">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">38</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="39">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">39</span>
                      </label>
                    </div>
                    <!-- height -->
                    <div class="height-options">
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Bệt">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">Bệt</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="3cm">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">3cm</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="5cm">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">5cm</span>
                      </label>
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="7cm">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">7cm</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="9cm">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">9cm</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="11cm">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">11cm</span>
                      </label>
                    </div>
                    <!-- special-option -->
                    <div class="special-options" style="margin-right: 40px;">
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Gót vuông">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">Gót vuông</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Gót nhọn">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">Gót nhọn</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Đế xuồng">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">Đế xuồng</span>
                      </label>
                    </div>
                    <!-- special-option -->
                    <div class="special-options">
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Mũi nhọn">
                        <span class="checkmark align-self-center"></span> <span style="margin-left: 25px;">Mũi nhọn</span>
                      </label>
    
                      <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-product" value="Mũi tròn">
                        <span class="checkmark"></span> <span style="margin-left: 25px;">Mũi tròn</span>
                      </label>
                    </div>
                  </div>
                  <form action="{{ route('client.products.search') }}" method="GET" enctype="text/plain">
                    <button class="btn btn-primary" type="submit" value="Tìm kiếm">Tìm kiếm</button>
                    <input type="text" id="tags" data-role="tagsinput" value="" name="key" placeholder="Tìm kiếm">
                    
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- product list-->
    <section id="product-list">
      <div class="container">
        <div class="row mb-4">
            @forelse ($attrs as $prod)
          <div class="col-lg-3">
            <div class="product">
              <div class="card">
                <div class="product-img">
                 
                  <a href="#"><img src="{{ asset('media/product') }}/{{ $prod->avatar }}"
                      class="mx-auto d-flex justify-content-center" alt=""></a>
                  <div class="product-colors justify-content-center d-flex">
                    <div class="product-color" style="background: #2d2d2d;"></div>
                    <div class="product-color" style="background: #ffffff;"></div>
                    <div class="product-color" style="background: #f55678;"></div>
                    <div class="product-color" style="background: #ffa733;"></div>
                  </div>
                </div>
                <div class="card-body">
                  <a href="#" class="product-name">{{ $prod->name }}</a>
                  <!-- rating -->
                  <div class="rating">
                    <!-- <input name="stars1" id="e1" type="radio"> -->
                    <label for="e1">
                      <i class="fas fa-star"></i>
                    </label>
                    <!-- <input name="stars1" id="e2" type="radio"> -->
                    <label for="e2">
                      <i class="fas fa-star"></i>
                    </label>
                    <!-- <input name="stars1" id="e3" type="radio"> -->
                    <label for="e3">
                      <i class="fas fa-star"></i>
                    </label>
                    <!-- <input name="stars1" id="e4" type="radio"> -->
                    <label for="e4">
                      <i class="fas fa-star"></i>
                    </label>
                    <!-- <input name="stars1" id="e5" type="radio"> -->
                    <label for="e5">
                      <i class="fas fa-star"></i>
                    </label>
                  </div>
                  <div class="clear"></div>
                  <!-- price -->
                  <div class="product-price">
                    <span class="old-price">{{ number_format($prod->price) }}</span>
                    <span class="new-price">{{ number_format($prod->price-$prod->price*$prod->discount/100) ?? '' }}</span>
                  </div>
                </div>
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <a href="#" class="cart-link text-muted">
                      <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                      <span>Add to cart</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
            @empty
                    <div class="alert alert-danger text-center m-auto w-100">không có sản phẩm nào được tìm thấy</div>
            @endforelse
        </div>
        <p class="text-uppercase text-center mt-5">loading...</p>
      </div>
    </section>
@endsection
@push('js')
  <script>
    $(".options-list").click(function () {
      if ($('.checkbox-option:visible').length)
        $('.checkbox-option').hide();
      else
        $('.checkbox-option').show();
    })

  </script>
  <script src="{{ asset('assets/client') }}/js/products.js"></script>
@endpush