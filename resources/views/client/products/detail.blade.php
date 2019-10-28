@extends('client.layouts.main', ['title' => __('Product details')])
@section('content')
  <!-- breadcrumb -->
<div class="bread-crumb">
    <div class="row" style="background: #ebebeb;">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm nữ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="active" href="#">Túi Flashligh da
                trăn</a></li>
            </ol>
        </nav>
        </div>
    </div>
</div>
  <section id="product-detail">
    <!-- product-slide-image -->
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="single_product_thumb">
            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
              <div class="row d-flex-space-between">
                <div class="col-lg-2 d-flex justify-content-between flex-column p-0">
                  <button onclick="scrollUp()" class="up-button text-center ml-4" style="z-index: 999;"><i
                      class="fas fa-angle-up"></i>
                  </button>
                  <ol class="carousel-indicators d-flex flex-column align-items-center m-0">

                    <ul class="thumbnail mr-3" style="height: 95%;">
                      <li data-target="#product_details_slider" data-slide-to="0"
                        style="background-image: url({{ asset('media/products') }}); background-size: 57px 65px; background-repeat: no-repeat;">
                      </li>
                    
                    </ul>

                  </ol>
                  <button onclick="scrollDown()" class="down-button text-center ml-4" style="z-index: 999;"><i
                      class="fas fa-angle-down"></i>
                  </button>
                </div>
                <div class="col-lg-9">
                  <div class="carousel-inner">
                    <div class="carousel-item active py-3" style="max-height: 600px;">
                      <a class="gallery_img" href="/assets/client/img/products/product-1.png">
                        <img class="d-block w-75 mx-auto" style="height: 384px; margin-top: 90px; margin-bottom: 90px;"
                          src="/assets/client/img/products/product-1.png" alt="First slide">
                      </a>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <div class="col-lg-5 p-0">
          <h5 class="product-name font-weight-bold">{{ $product->name }}</h5>
          <div class="product-code my-3">{{ $product->product_code }}
          </div>
          <!-- price -->
          <div class="product-price">
            <span class="new-price font-weight-bold">{{ number_format($product->price) }}</span>
            <span class="old-price text-muted">{{ number_format($product->discount) }}</span>
          </div>
          <!-- review -->
          <div class="review d-flex mt-2">
            <!-- rating -->
            <div class="rating m-0">
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
            <span class="ml-2">(3 Đánh giá)</span>
            <a href="#" class="ml-3 text-muted"><i class="fas fa-edit"></i> Viết đánh giá</a>
          </div>
          <!-- detail -->
          <div class="details">
            <div class="row">
              <div class="col-lg-5">
                <p>* Chất liệu : da trăn</p>
                <p>* Màu sắc : đen</p>
              </div>
              <div class="col-lg-7">
                <p>* Xuất xứ : P.R.C</p>
                <p>* Kích thước : 24*4*14</p>
              </div>
              <div class="col-lg-12">
                <p class="description">* Mô tả : Ví dài viền ánh kim <span id="dots">.</span><span id="more"
                    style="display: none;">Lorem, ipsum
                    dolor sit amet consectetur adipisicing elit. Libero, tenetur!</span>
                </p>
              </div>
            </div>
            <a class="font-weight-bold" onclick="myFunction()" id="myBtn">Xem thêm...</a>
          </div>
          <!-- policy -->
          <div class="policy">
            <div class="row" style="margin-left: 5px;">
              <div class="col-lg-4 text-center" style="padding: 22px 0;">
                <p class="text-muted m-0">Hỗ trợ đặt hàng</p>
                <p class="font-weight-bold m-0">1900292976</p>
              </div>
              <div class="col-lg-4 text-center" style="padding: 22px 0;">
                <p class="text-muted m-0">Thời gian đổi hàng</p>
                <p class="font-weight-bold m-0">7 ngày</p>
              </div>
              <div class="col-lg-4 text-center" style="padding: 22px 0;">
                <p class="text-muted m-0">Bảo hành VIP</p>
                <p class="font-weight-bold m-0">12 tháng</p>
              </div>
            </div>
          </div>
          <div class="form-underline mt-3 w-100" style="width: 102% !important; margin-left: 6px;"></div>
          <form action="">
            <div class="row mt-2">
              <div class="col-lg-4 pr-0">
                <!-- color -->
                <div class="product-colors d-flex">
                  <div class="product-color" style="background: #2d2d2d;"></div>
                  <div class="product-color" style="background: #ffffff;"></div>
                  <div class="product-color" style="background: #f55678;"></div>
                  <div class="product-color" style="background: #ffa733;"></div>
                </div>
              </div>
              <div class="col-lg-6 py-2">
                <!-- size -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span
                      style="border-radius: 0 !important; background: #ffffff; border-right: none !important;font-size: 14px !important;"
                      class="input-group-text text-muted pr-0" id="basic-addon1">Kích
                      thước:
                    </span>
                  </div>
                  <select class="form-control pl-0" name="size" id="size" style="border-left: 0 !important;"
                    style="font-size: 14px;">
                    <option value="">Nhỏ (S)</option>
                    <option value="">Nhỏ (S)</option>
                    <option value="">Nhỏ (S)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- quantity -->
              <div class="col-lg-4 p-0">
                <div class="number-input ml-2">
                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="my-auto ml-2"></button>
                  <input class="number" value="1" type="number" oninput="format(this)" min="1" max="24" step="1" />
                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    class="plus my-auto mr-2"></button>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="code form-control text-muted" type="text" placeholder="Mã ưu đãi"
                    style="font-size: 14px !important;">
                </div>
              </div>
            </div>
            <div class="btn-group my-3">
              <button type="submit" class="btn buy-button">
                <i class="fas fa-shopping-basket mr-2"></i>
                <span class="font-weight-bold text-uppercase">mua ngay</span>
              </button>
              <button class="btn like-button ml-2">
                <i class="fas fa-heart"></i>
                <span class="font-weight-bold text-uppercase">thích</span>
              </button>
            </div>
            <div class="form-underline mt- w-100" style="width: 102% !important; margin-left: 1px;"></div>
            <div class="category mt-2">
              <span class="text-muted"><i class="fas fa-pen-square mr-2"></i> Bộ sưu tập: </span>
              <a href="#" class="font-weight-bold">Túi da trăn</a>
            </div>
            <div class="social-network mt-2">
              <a href="#" class="btn social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="btn social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="btn social-link"><i class="fab fa-pinterest-p"></i></a>
              <a href="#" class="btn social-link"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="btn social-link"><i class="fab fa-tumblr"></i></a>
            </div>
          </form>
        </div>
      </div>
      <!-- product-detail-tab -->
      <div class="product-detail-tab mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-muted" id="desc-tab" data-toggle="tab" href="#desc" role="tab"
              aria-controls="home" aria-selected="true">Mô tả sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted" id="review-tab" data-toggle="tab" href="#review" role="tab"
              aria-controls="review" aria-selected="false">Đánh giá</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted" id="chart-tab" data-toggle="tab" href="#chart" role="tab"
              aria-controls="chart" aria-selected="false">Size Chart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted" id="showroom-tab" data-toggle="tab" href="#showroom" role="tab"
              aria-controls="showroom" aria-selected="false">Show room</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
            <p>Ví Flashlight dáng bì thư được làm từ da bò bền đẹp, mang đến trải nghiệm tuyệt vời khi sử dụng.

              Ví to bản được viền ánh kím lấp lánh, màu đen bóng mướt mắt, tạo điểm nhấn cho trang phục của nàng.

              Ví có nhiều ngăn giúp nàng để thẻ, giấy tờ cá nhân và điện thoại. Đây sẽ là lựa chọn tuyệt vời cho những
              chuyến đi và những cô nàng mang “cả thế giới” đi cùng. Item này phù hợp với hầu hết loại trang phục, tiện
              lợi cho những cô nàng công sở.............</p>
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">...</div>
          <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">...</div>
          <div class="tab-pane fade" id="showroom" role="tabpanel" aria-labelledby="showroom-tab">...</div>
        </div>
      </div>


    </div>
  </section>

  <div class="container">
    <div class="more-product">
      <div class="row">
        <p class="text-capitalize" style="font-size: 34px; margin-bottom: 40px;">sản phẩm liên quan</p>
        <div class="container">
          <div class="row mb-4">
            <div class="col-lg-3">
              <div class="product">
                <div class="card">
                  <div class="product-img">
                    <a href="#"><img src="/assets/client/img/products/product-1.png"
                        class="mx-auto d-flex justify-content-center" alt=""></a>
                    <div class="product-colors justify-content-center d-flex">
                      <div class="product-color" style="background: #2d2d2d;"></div>
                      <div class="product-color" style="background: #ffffff;"></div>
                      <div class="product-color" style="background: #f55678;"></div>
                      <div class="product-color" style="background: #ffa733;"></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="#" class="product-name">Luxury Bag for Women</a>
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
                      <span class="old-price">8.000.000</span>
                      <span class="new-price">4.000.000</span>
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
            <div class="col-lg-3">
              <div class="product">
                <div class="card">
                  <div class="product-img">
                    <a href="#"><img src="/assets/client/img/products/product-2.png"
                        class="mx-auto d-flex justify-content-center" alt=""></a>
                    <div class="product-colors justify-content-center d-flex">
                      <div class="product-color" style="background: #2d2d2d;"></div>
                      <div class="product-color" style="background: #ffffff;"></div>
                      <div class="product-color" style="background: #f55678;"></div>
                      <div class="product-color" style="background: #ffa733;"></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="#" class="product-name">Luxury Bag for Women</a>
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
                      <span class="old-price">8.000.000</span>
                      <span class="new-price"></span>
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
            <div class="col-lg-3">
              <div class="product">
                <div class="card">
                  <div class="product-img">
                    <a href="#"><img src="/assets/client/img/products/product-3.png"
                        class="mx-auto d-flex justify-content-center" alt=""></a>
                    <div class="product-colors justify-content-center d-flex">
                      <div class="product-color" style="background: #2d2d2d;"></div>
                      <div class="product-color" style="background: #ffffff;"></div>
                      <div class="product-color" style="background: #f55678;"></div>
                      <div class="product-color" style="background: #ffa733;"></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="#" class="product-name">Luxury Bag for Women</a>
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
                      <span class="old-price">8.000.000</span>
                      <span class="new-price"></span>
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
            <div class="col-lg-3">
              <div class="product">
                <div class="card">
                  <div class="product-img">
                    <a href="#"><img src="/assets/client/img/products/product-4.png"
                        class="mx-auto d-flex justify-content-center" alt=""></a>
                    <div class="product-colors justify-content-center d-flex">
                      <div class="product-color" style="background: #2d2d2d;"></div>
                      <div class="product-color" style="background: #ffffff;"></div>
                      <div class="product-color" style="background: #f55678;"></div>
                      <div class="product-color" style="background: #ffa733;"></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="#" class="product-name">Luxury Bag for Women</a>
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
                      <span class="old-price">8.000.000</span>
                      <span class="new-price"></span>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- showroom -->
@endsection

  <script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Xem thêm";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Rút gọn";
        moreText.style.display = "inline";
      }
    }

    function scrollDown() {
      document.querySelector('.thumbnail').scrollBy(0, 50);
    }
    function scrollUp() {
      document.querySelector('.thumbnail').scrollBy(0, -100);
    }
    $('.thumbnail li').click(function () {
      $(this).addClass("active")
    })
  </script>
</body>

</html>