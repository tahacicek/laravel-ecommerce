<div>
  <div class="row">
    @forelse ($products as $product)
    <div class="col-md-4">
        <div class="product-card ">
            @if ($product->quantity > 0)
                <div class="badges badge-success" style="background-color:green">Stokta Var</div>
            @else
                <div class="badges badge-success" style="background-color:yellow">Stokta Yok</div>
            @endif

            <div class="badges mt-5">TREND</div>
            <div class="product-tumb">
                @if ($product->productImages->count() > 0)
                <a
                        href="{{ url('/kategori/' . $product->category->slug . '/' . $product->slug) }}">{{ $product->name }}
                    <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}"></a>
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
    <span class="text-dark text-center product-catagory">{{ $category->name }} ADLI KATEGORİDE ÜRÜN YOK.</span>
    @endforelse
  </div>
</div>
