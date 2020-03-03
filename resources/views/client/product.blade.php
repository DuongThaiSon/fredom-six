@include('client.layouts.header')
@section('content')
@extends('client.layouts.main', ['title'=> 'Product'])
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="{{ route('client.home')}}" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="{{ route('client.product')}}" class="text-capitalize">portfolio</a> &nbsp > &nbsp
                <a class="text-capitalize font-weight-bold category"></a>
            </p>
        </div>
    </section>

    <section id="products-list">
        <div class="container">
            <div class="view-all_pc">
                <ul class="view-all nav">
                    @forelse ($productCat as $item)
                        <li class="js-changebg nav-item">
                            <a class="text-uppercase nav-link category-name" data-toggle="tab" href="#product-{{ $item->slug??'' }}">{{ $item->name??'' }}</a>
                        </li>
                        @if($loop->iteration == ceil(count($productCat)/2))
                            <li class="js-changebg nav-item ">
                                <a class="text-uppercase category-name" data-toggle="tab" href="#product-view-all">view all</a>
                            </li>
                        @endif
                    @empty
                        
                    @endforelse
                </ul>
            </div>
            <div class="view-all_mobile d-none">
                <nav class="navbar">
                    <ul class="view-all nav navbar-nav">
                        <li class="js-changebg-2 nav-item main-bg_color">
                            <a class="text-uppercase nav-link" data-toggle="tab" href="#product-view-all">view all</a>
                        </li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavbar">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="view-all nav navbar-nav">
                            @forelse ($productCat as $item)
                                <li class="js-changebg-2 nav-item">
                                    <a class="text-uppercase nav-link category-name" data-toggle="tab"
                                        href="#product-{{ $item->slug??''}}">{{ $item->name??''}}</a>
                                </li>
                            @empty
                                
                            @endforelse
                            
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="tab-content">
                @forelse ($productCat as $item)
                    <div id="product-{{ $item->slug??''}}" class="tab-pane fade">
                        <h1 class="text-capitalize">{{ $item->name??''}}</h1>
                        {!! $item->description??'' !!}
                        
                        {{ $products[$item->id]->links()}}

                        <div class="clear-fix"></div>
                        <div class="products">
                            <div class="row">
                                @forelse ($products[$item->id] as $item)
                                    <div class="col-lg-4 col-md-12">
                                        <a href="{{ route('client.product.detail', ['slug' => $item->slug??''])}}">
                                            <img src="/media/images/articles/{{ $item->avatar??""}}" alt="">
                                        </a>
                                    </div>
                                @empty
                                    
                                @endforelse
                                
                            </div>
                        </div>

                        {{ $products[$item->id]->links()}}

                    </div>
                @empty
                    
                @endforelse

                

                <div id="product-view-all" class="tab-pane fade ">
                    <h1 class="text-capitalize">view all</h1>
                    {!! $productParentCat->description??'' !!}

                    {{ $allProducts->links()}}

                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            @forelse ($allProducts as $item)
                                <div class="col-lg-4 col-md-12">
                                    <a href="{{ route('client.product.detail', ['slug' => $item->slug??''])}}">
                                        <img src="/media/images/articles/{{ $item->avatar??""}}" alt="">
                                    </a>
                                </div>
                            @empty
                                
                            @endforelse
                            
                        </div>
                    </div>

                    {{ $allProducts->links()}}

                </div>

                
            </div>
        </div>
    </section>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        var hash = window.location.hash;
        if (hash != null) {
            $(`a[href="${hash}"]`).tab('show');
            $(`a[href="${hash}"]`).addClass('show active');
            $(`a[href="${hash}"]`).parent().addClass('main-bg_color');
        } else {
            $(`a[href="#product-view-all"]`).tab('show');
            $(`a[href="#product-view-all"]`).addClass('show active');
        }
        $('.category').text($('a.active:first').text());
        $('.category-name').on('click', function() {
            let text = $(this).text();
            $('.category').html(text);
        });
    });

</script>
@endpush