<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row cart-wrapper">
                    <div class="col-sm-8 col-md-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr class="text-">
                                        <th class="thumbnail-col"></th>
                                        <th class="product-col">Ürün</th>
                                        <th class="price-col">Fiyat</th>
                                        <th class="text-end">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlist as $item)
                                        @if ($item->product)
                                            <tr class="product-row">
                                                <td>
                                                    <figure class="product-image-container">
                                                        <a href="{{ url('kategori/' . $item->product->category->slug . '/' . $item->product->slug) }}"
                                                            class="product-image">
                                                            <img
                                                                src="{{ asset($item->product->productImages[0]->image) }}">
                                                        </a>

                                                    </figure>
                                                </td>
                                                <td class="product-col">
                                                    <h5 class="product-title">
                                                        <a
                                                            href="{{ url('kategori/' . $item->product->category->slug . '/' . $item->product->slug) }}"><strong>{{ $item->product->name }}</strong></a>
                                                    </h5>
                                                </td>
                                                <td><strong>{{ $item->product->selling_price }} ₺</strong></td>
                                                <td>

                                                    <div class="quantity-">
                                                        <div class="input-group">
                                                            <button class="btn btn-block btn-dark">Sepete Ekle</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        wire:click='removeWishlistItem({{ $item->id }})'
                                                        class="btn btn-outline-danger">
                                                        <span wire:loading.remove><i class="fa fa-times"
                                                                aria-hidden="true"></i>
                                                        </span>
                                                        <span wire:loading wire:target='removeWishlistItem'>
                                                            <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                                            Siliniyor..
                                                        </span>

                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No items in wishlist</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="cart-summary">
                            <h3>WİSHLİST TOTALS</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Toplam Ürün</td>
                                        <td>{{ $wishlist->count() }} Adet</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-left promo-code-area">
                                            <h3>Help</h3>
                                            <div class="cart-discount">
                                                <form action="#">
                                                    <div class="input-group">
                                                        <textarea type="text" class="form-control form-control-sm"
                                                            placeholder="Your Message" rows="1" required></textarea>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-block apply-coupon-btn btn-success" type="submit"><i class="fa me-1 fa-comments" aria-hidden="true"></i> HELP</button>
                                                        </div>
                                                    </div><!-- End .input-group -->
                                                </form>
                                            </div>
                                            <button type="submit" class="btn btn-shop btn-update-total">
                                                Update Totals
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    @forelse ($wishlist as $item)


                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->selling_price }} ₺</td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="#!" class="btn btn-block btn-icon btn-dark">Sepete Ekle ve Devam Et <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div><!-- End .cart-summary -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
