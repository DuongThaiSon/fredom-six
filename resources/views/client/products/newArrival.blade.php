@extends('client.layouts.main', ['title' => __('New Arrival')])
@section('content')
<!-- breadcrumb -->
<div class="bread-crumb">
  <div class="row" style="background: #ebebeb;">
    <div class="container">
      <nav aria-label="breadcrumb">
        {{-- <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a class="active" href="#">Sản phẩm nữ</a></li>
        </ol> --}}
      </nav>
    </div>
  </div>
</div>
<!-- showcase -->
<div id="showcase" style="height: 645px; overflow: hidden;">
  <img src="/assets/client/img/contact-img/leatherBag.png" style="width: 100%; background-position: top;" alt="">
</div>

  <!-- product list-->
  <section id="product-list">
    <div class="container">
      <div class="row mb-4">
          @forelse ($productNew as $prod)
        <div class="col-lg-3">
          <div class="product mb-3">
            <div class="card">
              <div class="product-img">
                <a href="{{ route('client.products.detail', $prod->id) }}"><img src="{{ asset('/media/product') }}/{{ $prod->avatar }}"
                    class="mx-auto d-flex justify-content-center" alt=""></a>
                <div class="product-colors justify-content-center d-flex">
                  <div class="product-color" style="background: #2d2d2d;"></div>
                  <div class="product-color" style="background: #ffffff;"></div>
                  <div class="product-color" style="background: #f55678;"></div>
                  <div class="product-color" style="background: #ffa733;"></div>
                </div>
              </div>
              <div class="card-body">
                <a href="{{ route('client.products.detail', $prod->id) }}" class="product-name">{{ $prod->name }}</a>
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
                  <span class="{{ ($prod->discount > 0)?'old-price':'new-price' }}">{{ number_format($prod->price) }}</span>
                  <span class="new-price">{{ (($prod->discount > 0)?number_format($prod->price-$prod->price*$prod->discount/100):'') }}</span>
                </div>
              </div>
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <a href="" data-id="{{ $prod->id }}" class="btn-add-cart cart-link text-muted ">
                    <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                    <span>Add to cart</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="alert alert-danger text-center m-auto w-100">Không có sản phẩm nào được tìm thấy</div>
        @endforelse
     </div>
     {{ $productNew->links() }} 
        {{-- <p class="text-uppercase text-center mt-5">loading...</p> --}}
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
    });
   
  </script>
  <script>
 
</script>
  <script src="{{ asset('assets/client') }}/js/products.js"></script>
@endpush