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
                <a href="{{ route('client.products.detail', ['slug_cat' => $prod->categories[0]->slug, 'slug_view' => $prod->slug]) }}"><img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $prod->avatar }}"
                    class="mx-auto d-flex justify-content-center" alt=""></a>
                <div class="product-colors justify-content-center d-flex">
                    @forelse ($prod->productAttributeValues as $attribute)
                        @if ($attribute->productAttribute->type === 'color')
                        <a href="#" class="choose-color" data-color="{{ $attribute->value }}">
                            <div class="product-color" style="background: {{ $attribute->value }};">
                            </div>
                        </a>
                        @endif

                    @empty
                    @endforelse
                    <input type="hidden" name="color" value="{{ $prod->productAttributeValues->firstWhere('productAttribute.type', 'color') ? $prod->productAttributeValues->firstWhere('productAttribute.type', 'color')->value : '' }}">
                    <input type="hidden" name="size" value="{{ $prod->productAttributeValues->firstWhere('productAttribute.name', 'Kích cỡ') ? $prod->productAttributeValues->firstWhere('productAttribute.name', 'Kích cỡ')->value : '' }}">
                </div>
              </div>
              <div class="card-body">
                <a href="{{ route('client.products.detail', ['slug_cat' => $prod->categories[0]->slug, 'slug_view' => $prod->slug]) }}" class="product-name">{{ $prod->name }}</a>
                <!-- rating -->
                <div id='rating' class='rating'>
                    <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 1 ? 'clickStars' : '' }}'>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 2 ? 'clickStars' : '' }}'>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 3 ? 'clickStars' : '' }}'>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 4 ? 'clickStars' : '' }}'>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 5 ? 'clickStars' : '' }}'>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                </div>
                <!-- price -->
                <div class="product-price">
                  <span class="{{ ($prod->discount > 0)?'old-price':'new-price' }}" >{{ number_format($prod->price) }}đ</span>
                  <span class="new-price">{{ (($prod->discount > 0)?number_format($prod->price-$prod->price*$prod->discount/100) .'đ':'') }}</span>
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
     {{-- {{ $productNew->links() }} --}}
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
