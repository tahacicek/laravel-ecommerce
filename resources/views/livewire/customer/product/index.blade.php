<div class="">
    <div class="row">
        <div class="col-md-4 mt-5">
            @if ($category->brands)
            <div class="product-card  ">
                <div class="card-header text-center">
                    <h5>Markalar</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($category->brands as $brand)
                            <li class="list-group">
                                <div class="d-block mx-auto mt-2">
                                        <input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}"  class="btn-check" id="{{ $brand->id }}"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary col-md-12" style="width:180px" for="{{ $brand->id }}">{{ $brand->name }}</label><br>
                                </div>
                                {{-- <a href="{{ route('customer.product.index', ['category' => $category->slug, 'brand' => $brand->slug]) }}">
                                    {{ $brand->name }}
                                </a> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @endif
        </div>
            @forelse ($products as $product)
                <div class="col-md-4 mt-5">
                    <div class="product-card" style="width: 350px" >
                        @if ($product->quantity > 0)
                            <div class="badges badge-success" style="background-color:green">Stokta Var</div>
                        @else
                            <div class="badges badge-success" style="background-color:yellow">Stokta Yok</div>
                        @endif

                        <div class="badges mt-5">TREND</div>
                        <div class="product-tumb">
                            @if ($product->productImages->count() > 0)
                                <a href="{{ url('/kategori/' . $product->category->slug . '/' . $product->slug) }}">{{ $product->name }}
                                    <img src="{{ asset($product->productImages[0]->image) }}"
                                        alt="{{ $product->name }}"></a>
                            @endif
                        </div>
                        <div class="product-details">

                            <span class="product-catagory">{{ $category->name }}</span>
                            <span class="product-catagory">{{ $product->brand }}</span>
                            <h4><a
                                    href="{{ url('/kategori/' . $product->category->slug . '/' . $product->slug) }}">{{ $product->name }}</a>
                            </h4>
                            <p>{{ $product->small_description }}</p>
                            <div class="product-bottom-details">
                                <div class="product-price">
                                    <small>{{ $product->selling_price }}₺</small>{{ $product->price }}230.99₺
                                </div>
                                <div class="product-links">
                                    <a href=""><i class="fa fa-heart"></i></a>
                                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="product-card">
                    <div class="badge">Hot</div>
                    <div class="product-tumb">
                        <img
                            src="https://avatars.mds.yandex.net/i?id=bc687655534f3df607df99244ba2e662-4417779-images-thumbs&n=13&exp=1">
                    </div>
                    <div class="product-details">
                        <span class="text-dark text-center product-catagory">{{ $category->name }} ADLI KATEGORİDE ÜRÜN
                            YOK.</span>
            @endforelse
        </div>
    </div>
