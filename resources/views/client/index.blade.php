@extends('client.layouts.main', ['title' => __('Product details')])
@section('content')
<!-- showcase -->
<div id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
        <!-- slide -->
        <div class="carousel-item active"
            style="background:url('/assets/client/img/banner.png'); background-size: cover; height: 900px;">
            <div class="container">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-md-6 d-none d-md-block" style="padding-left: 70px;">
                <div class="showcase-title">
                    <h2 class="text-uppercase font-italic">the</h2>
                    <h2 class="text-uppercase font-italic ml-3">most</h2>
                    <h1 class="text-uppercase display-4">luxury</h1>
                    <h1 class="text-uppercase display-4 mb-4" style="margin-left: 120px;">
                    bag
                    </h1>
                    <p>
                    Use this text to share information about your brand with your
                    customers. Describe a product, share annoucement, or welcome
                    customers to your store
                    </p>
                    <a href="#" class="btn text-uppercase">news arrivals</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
  <!-- about -->
  <section id="about">
    <div class="container">
      <div class="row py-5">
        <div class="col-lg-6 col-md-12 py-lg-4 my-lg-5">
          <h3 class="text-uppercase">giới thiệu</h3>
          <h1 class="text-uppercase display-4">sản phẩm da trăn moolez</h1>
          <p class="mb-5">
            Luôn là tâm điểm mỗi lần ra mắt, vẻ đẹp lộng lẫy, quyền lực và ma mị của
            những chiếc túi xách da trăn thuộc dòng Luxury Limited tiếp tục khiến
            giới mộ điệu choáng ngợp, tôn thờ. Từ lớp da trăn gấm nuôi quý hiếm có
            hoa văn độc nhất vô nhị, những nghệ nhân bậc thầy đã khéo léo kết hợp
            cùng họa tiết đầu trăn đính đá quý snovakio lấp lánh và mạ vàng 14k để
            tạo ra những tuyệt tác xa xỉ, mê đắm lòng người.
          </p>
          <p>
            Sự sáng tạo và trau chuốt trong từng thiết kế đã giúp Moolez gửi đến quý
            bà, quý cô đang hoạt động trên các lĩnh vực nghề nghiệp những lựa chọn đa
            dạng, vượt mọi khuôn phép hay hình mẫu. Đây cũng là thông điệp Moolez
            muốn đồng hành cùng phái đẹp tìm thấy và tự tin, tỏa sáng với hình ảnh
            hoàn hảo nhất, phiên bản duy nhất của chính mình.
          </p>
        </div>
        <div class="col-lg-6 col-md-12 py-lg-4 my-lg-5">
          <img src="/assets/client/img/bags.png" class="pl-5 mt-5" alt="" />
        </div>
      </div>
    </div>
    <!-- about text -->
    <div class="row" data-aos="fade-right" data-aos-duration="3000">
      <div class="col-lg-8 col-md-12" style="background: #ebebeb">
        <div class="about-text py-5">
          <p class="m-0">
            Moolez không chỉ tạo nên giày, dép, túi xách, phụ kiện… mà tạo nên “nghệ
            thuật”. Phong cách Moolez khác biệt ở chỗ, trở thành một hướng đạo sinh
            cho khách hàng đi tìm bản ngã của cuộc sống, sự tự tin trong tâm hồn và
            đặt điểm mốc nổi bật cho cá tính riêng biệt.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- collection -->
  <section id="collection">
    <div class="row">
      <div class="col-md-4 col-sm-block">
        <a href="#">
          <div class="card-collection"
            style="background: url('/assets/client/img/luxury.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>luxury collection</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-block">
        <a href="#">
          <div class="card-collection"
            style="background: url('/assets/client/img/business.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>business collection</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-block">
        <a href="#">
          <div class="card-collection"
            style="background: url('/assets/client/img/classic.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>classic collection</h2>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!-- sale -->
  <section id="sale">
    <h2 class="sale-title">Hot sale</h2>
    <div class="container">
      <div class="banner">
        <div id="banner" class="owl-carousel owl-theme">
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content position-absolute">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- gift -->
  <section id="gift">
    <div class="gift-image">
      <a href="#"><img src="/assets/client/img/gift.png" alt=""></a>
      <h1 class="text-uppercase display-3">gifts</h1>
    </div>
  </section>
  <!-- mix & match -->
  <section id="mix-match" class="mb-4 d-none d-lg-block">
    <h1 class="text-center display-3 text-uppercase">mix & match</h1>
    <div id="match" class="owl-carousel owl-theme">
      <div class="item">
        <div class="row" style="height: 578px">
          <div class="col-lg-3 full-set">
            <img src="/assets/client/img/shortJean.png" alt="">
          </div>
          <div class="col-lg-3">
            <div class="clothe">
              <img src="/assets/client/img/clothe.png" alt="">
              <div class="clothe-name">
                <p class="mb-0">Áo SiLiCa</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
            <div class="short">
              <img src="/assets/client/img/short.png" alt="">
              <div class="short-name">
                <p class="mb-0">Quần Short</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="earing">
              <img src="/assets/client/img/item.png" alt="">
              <div class="earing-name">
                <p class="mb-0">Khuyên tai</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
            <div class="watch">
              <img src="/assets/client/img/watch.png" alt="">
              <div class="watch-name">
                <p class="mb-0">Đông hồ</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
            <div class="glasses">
              <img src="/assets/client/img/glasses.png" alt="">
              <div class="glasses-name">
                <p class="mb-0">Kính</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="shoes">
              <img src="/assets/client/img/shoes.png" alt="">
              <div class="shoes-name">
                <p class="mb-0">Mules</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
            <div class="bag">
              <img src="/assets/client/img/bag.png" alt="">
              <div class="bag-name">
                <p class="mb-0">Túi Orico</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- lookbook -->
  <section id="lookbook">
    <div class="row">
      <div class="col-md-6 p-0">
        <div class="col-lg-9 mx-auto">
          <div class="lookbook-content">
            <h3 class="text-uppercase">weekend lookbook</h3>
            <h2 class="text-uppercase display-4">business woman</h2>
            <div class="line"></div>
            <p> Use this text to share information about your brand with your customers.
              Describe a product, share announcements, or welcome customers to your
              store.</p>
            <div class="learn">
              <a href="" class="text-uppercase">learn more</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 p-0">
        <div class="lookbook-img">
          <img src="/assets/client/img/business-woman.png" alt="">
        </div>
      </div>

      <div class="col-md-6 p-0">
        <div class="lookbook-img">
          <img src="/assets/client/img/men-style.png" alt="">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 p-0">
        <div class="col-lg-9 mx-auto">
          <div class="lookbook-content">
            <h3 class="text-uppercase">travel in style</h3>
            <h2 class="text-uppercase display-4">men styled outfits</h2>
            <div class="line"></div>
            <p>Use this text to share information about your brand with your customers.
              Describe a product, share announcements, or welcome customers to your
              store.</p>
            <div class="learn">
              <a href="" class="text-uppercase">learn more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- customer -->
  <section id="customer">
    <h2 class="cus-title display-4 text-uppercase text-center">
      customer reviews
    </h2>
    <div class="container">
      <!-- customer slide -->
      <div id="cus-slide" class="owl-carousel owl-theme">
        <div class="item">
          <div class="card-customer card border-0 mx-auto">
            <img src="/assets/client/img/business.png" class="card-img" alt="">
            <div class="card-body">
              <div class="card-name text-capitalize text-center">adam smith</div>
              <div class="card-job text-capitalize text-center">english teacher</div>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
                nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit
                quos.</p>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="card-customer card border-0 mx-auto">
            <img src="/assets/client/img/customer4.png" class="card-img" alt="">
            <div class="card-body">
              <div class="card-name text-capitalize text-center">jennifer lopez</div>
              <div class="card-job text-capitalize text-center">official</div>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
                nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit
                quos.</p>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="card-customer card border-0 mx-auto">
            <img src="/assets/client/img/customer5.png" class="card-img" alt="">
            <div class="card-body">
              <div class="card-name text-capitalize text-center">quỳnh nguyễn</div>
              <div class="card-job text-capitalize text-center">blogger</div>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
                nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit
                quos.</p>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="card-customer card border-0 mx-auto">
            <img src="/assets/client/img/customer-6.png" class="card-img" alt="">
            <div class="card-body">
              <div class="card-name text-capitalize text-center">john smith</div>
              <div class="card-job text-uppercase text-center">ceo</div>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
                nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit
                quos.</p>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="card-customer card border-0 mx-auto">
            <img src="/assets/client/img/customer.png" class="card-img" alt="">
            <div class="card-body">
              <div class="card-name text-capitalize text-center">adam smith</div>
              <div class="card-job text-capitalize text-center">english teacher</div>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
                nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit
                quos.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- quote -->
      <div class="quote">
        <img src="/assets/client/img/quote.png" class="float-left" alt="">
        <p class="text-center font-italic">This collection is so well organised – the best I’ve ever seen from here.
          The ideas are also really fresh and new – great work. I cant wait to start
          work with it!</p>
      </div>
      <div class="cmt text-center">
        <div class="ava-cmt">
          <img src="/assets/client/img/customer3.png" alt="">
        </div>
        <div class="cmt-name">
          <p class="text-capitalize font-weight-bold">Huyền Anh</p>
          <p class="font-italic">BTN báo Đẹp</p>
        </div>
      </div>
    </div>
  </section>
  <!-- partner -->
  <section id="partner">
    <div class="line"></div>
    <div class="container">
      <div id="logo-partner" class="owl-carousel owl-theme">
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/color-company.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/king.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/trend.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/brilliant-color.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/inside.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/fashion-color.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="/assets/client/img/telenor.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="line"></div>
  </section>
  <!-- customer voice -->
  <section id="customer-voice">
    <div class="row">
      <div class="col-lg-4">
        <h1 class="text-uppercase text-right">customer voice</h1>
      </div>
      <div class="col-lg-8 ask">
        <div class="form">
          <textarea name="" id="" cols="30" rows="10"></textarea>
          <div class="textarea-bottom">
            <div class="send d-flex">
              <span class="mr-auto m-0">Đặt câu hỏi thắc mắc cho chúng tôi</span>
              <button type="submit" class="border-0" style="background: #ebebeb;">
                <a href="">
                  <i class="fas fa-paper-plane"></i>
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- news -->
  <section id="news">
    <div class="container">
      <div id="new-slide" class="owl-carousel owl-theme">
        <div class="card-news card-border-0">
          <img src="/assets/client/img/paper1.png" alt="" class="card-img-top">
          <div class="card-body">
            <p class="card-title text-uppercase font-weight-bold pt-3"> BIẾN HÓA THỜI THƯỢNG THÀNH
              “LITTLE GIRLS IN STREETS” VỚI SET PHỤ KIỆN HỌA TIẾT GINGHAM </p>
            <p class="card-text">Hàng trăm khách hàng yêu quý đã ghé thăm MOOLEZ tại TTTM Lotte để tận
              hưởng vô vàn ưu đãi và nhận được nhiều QUÀ TẶNG hấp dẫn.</p>
            <a href="#" class="learn text-uppercase">Learn more</a>
          </div>
        </div>

        <div class="card-news card-border-0">
          <img src="/assets/client/img/paper2.png" alt="" class="card-img-top">
          <div class="card-body">
            <p class="card-title text-uppercase font-weight-bold pt-3"> BIẾN HÓA THỜI THƯỢNG THÀNH
              “LITTLE GIRLS IN STREETS” VỚI SET PHỤ KIỆN HỌA TIẾT GINGHAM </p>
            <p class="card-text">Hàng trăm khách hàng yêu quý đã ghé thăm MOOLEZ tại TTTM Lotte để tận
              hưởng vô vàn ưu đãi và nhận được nhiều QUÀ TẶNG hấp dẫn.</p>
            <a href="#" class="learn text-uppercase">Learn more</a>
          </div>
        </div>

        <div class="card-news card-border-0">
          <img src="/assets/client/img/paper3.png" alt="" class="card-img-top">
          <div class="card-body">
            <p class="card-title text-uppercase font-weight-bold pt-3"> BIẾN HÓA THỜI THƯỢNG THÀNH
              “LITTLE GIRLS IN STREETS” VỚI SET PHỤ KIỆN HỌA TIẾT GINGHAM </p>
            <p class="card-text">Hàng trăm khách hàng yêu quý đã ghé thăm MOOLEZ tại TTTM Lotte để tận
              hưởng vô vàn ưu đãi và nhận được nhiều QUÀ TẶNG hấp dẫn.</p>
            <a href="#" class="learn text-uppercase">Learn more</a>
          </div>
        </div>

        <div class="card-news card-border-0">
          <img src="/assets/client/img/paper1.png" alt="" class="card-img-top">
          <div class="card-body">
            <p class="card-title text-uppercase font-weight-bold pt-3"> BIẾN HÓA THỜI THƯỢNG THÀNH
              “LITTLE GIRLS IN STREETS” VỚI SET PHỤ KIỆN HỌA TIẾT GINGHAM </p>
            <p class="card-text">Hàng trăm khách hàng yêu quý đã ghé thăm MOOLEZ tại TTTM Lotte để tận
              hưởng vô vàn ưu đãi và nhận được nhiều QUÀ TẶNG hấp dẫn.</p>
            <a href="#" class="learn text-uppercase">Learn more</a>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection
