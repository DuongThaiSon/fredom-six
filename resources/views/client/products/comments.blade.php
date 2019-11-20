@foreach ($reviews as $review)
<div class="product-comment mt-5 d-flex">
    <a href="#" class="align-self-center" data-id="{{ $review->user_id }}">
        <img src="{{ $review->user->avatar ? '/assets/client/img/customer.png' : 'http://goo.gl/vyAs27' }}" style="width: 100px; height: 100px; border: 1px ridge;" alt=""
            class="rounded-circle">
    </a>
    <div class="comment-detail ml-5" style="flex: 0 0 800px">
        <div class="d-flex">
            <p class="comment-time m-0 align-self-center">{{ $review->user->name }} - </p>
            <p class="comment-time m-0 align-self-center">{{ $review->created_at }}</p>
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
@endforeach
<div class="d-flex justify-content-center">
    {{ $reviews->links() }}
</div>

