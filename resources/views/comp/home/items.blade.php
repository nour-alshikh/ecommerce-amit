<div id="test" class="container my-5">
    <h2 class="m-0 items text-center fs-2 position-relative">Featured Items</h2>
    <div class="text-center d-flex justify-content-center align-items-center w-50 m-auto my-3">
        @foreach ($cats as $cat)
            <a class="fs-5 px-2 text-primary" href="{{ route('shop_cat', $cat->id) }}">{{ $cat->name }}</a>
        @endforeach
    </div>
    <div class="d-flex flex-wrap">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-3 p-2 my-2">
                <div class="image">
                    <div class="itemOverlay">
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="eye">
                                <i class="fas fa-eye text-white fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <img style="height:400px" class="w-100" src="uploads/products/{{ $product->image }}"
                        alt="">

                    <div class="price">$ {{ $product->price }}</div>
                </div>
                <h3 class="my-2  fs-3 fw-bold">{{ $product->name }}</h3>
                <div class="icons fs-4 my-3 d-flex justify-content-start align-items-center">
                    <div class="star px-1">
                        <i class="fas fa-star fs-2"></i>
                    </div>
                    <div class="star px-1">
                        <i class="fas fa-star fs-2"></i>
                    </div>
                    <div class="star px-1">
                        <i class="fas fa-star fs-2"></i>
                    </div>
                    <div class="star px-1">
                        <i class="fas fa-star fs-2"></i>
                    </div>
                    <div class="star px-1">
                        <i class="fas fa-star fs-2"></i>
                    </div>
                </div>
                <div class="share d-flex justify-content-start align-items-center">
                    <div class="icon heart mx-1">
                        <form class="mb-0" action="{{ route('add_to_wishlist', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fas fa-heart fs-4"></i>
                            </button>
                        </form>

                    </div>
                    <div class="icon cart mx-1">
                        <form class="mb-0" action="{{ route('icon_add_to_cart', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="1" name="quantity" />
                            <button type="submit">
                                <i class="fas fa-cart-shopping fs-4"></i>

                            </button>
                        </form>
                    </div>
                    <div class="icon share mx-1">
                        <i class="fas fa-share-nodes fs-4"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center align-items-center">

    {{ $products->links() }}
</div>
</div>
