@foreach ($reviews as $review)
<div class="product-comment mt-5 d-flex">
    {{-- <div class="col-2 text-center align-self-center">
        <h5>{{ $review->user->name ?? '' }}</h5>
    </div> --}}
    <div class="comment-detail col-12" >
        <div class="d-flex">
            <h3 class="comment-time m-0 align-self-center">{{ $review->user->name }}</h3>
            <p class="comment-time m-0 align-self-center">- {{ $review->created_at }}</p>
            <div id='rating' class='rating m-0 ml-3'>
                <span class='ratingStars {{  $review->rate >= 1 ? 'clickStars' : '' }}' >
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
                <span class='ratingStars {{  $review->rate >= 2 ? 'clickStars' : '' }}' >
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
                <span class='ratingStars {{  $review->rate >= 3 ? 'clickStars' : '' }}' >
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
                <span class='ratingStars {{  $review->rate >= 4 ? 'clickStars' : '' }}' >
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
                <span class='ratingStars {{  $review->rate >= 5 ? 'clickStars' : '' }}' >
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <p>{{ $review->content }}</p>
    </div>
</div>
<hr>
@endforeach
<div class="d-flex justify-content-center">
    {{ $reviews->links() }}
</div>

