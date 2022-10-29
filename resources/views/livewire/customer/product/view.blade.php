
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    @if ($product->productImages)
                    <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                    @else
                    <img src="https://yandex.com.tr/gorsel/search?text=no%20image&from=tabbar&pos=2&img_url=http%3A%2F%2Fstatic.tildacdn.com%2Ftild3230-3734-4335-a634-633234336335%2FnoImg_2-1.jpg&rpt=simage&lr=11511" class="w-100" alt="Img">
                    @endif
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        <label class="label-stock bg-success">In Stock</label>
                    </h4>
                    <hr>
                    <p class="product-path" style="font-style: italic">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">{{ $product->selling_price }}₺</span>
                        <span class="original-price">{{ $product->original_price }}₺</span>
                    </div>
                    <hr>
                    <div>
                        @if ($product->productColors)
                        <div class="product-color">
                            <label>Renk Seçim</label>
                            <div class="color-list mt-2 mb-3">
                                @foreach ($product->productColors as $color)
                                <input type="radio" class="btn-check" value="{{ $color->id }}" name="colorSelection" id="{{ $color->id }}" autocomplete="off" />
                                <label style="background-color: {{ $color->color->code }}" class="btn-circle btn btn-outline-secondary btn-sm btn-rounded" for="{{ $color->id }}"></label>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="product-color">
                            <label>Color</label>
                            <div class="color-list">
                                <div class="color-item" style="background-color: #000000"></div>
                            </div>
                        </div>


                        @endif
                    </div>
                    <div class="mt-2">
                        <div class="def-number-input number-input safari_only">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                            <input class="quantity" min="1" name="quantity" value="1" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                          </div>
                    </div>
                    <div class="mt-2">
                        <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                           {!! $product->small_description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
