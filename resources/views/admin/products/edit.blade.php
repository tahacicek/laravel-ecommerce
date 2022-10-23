@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Ürünler</h2>
                        <p class="mb-md-0">Bu sayfada ürün oluşturuluyor.</p>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('admin.') }}"><i class="mdi mdi-home text-muted hover-cursor"></i></a>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="btn btn-sm btn-secondary"
                                href="{{ url('admin/product') }}">Ürünler</a>&nbsp;/&nbsp;<button
                                class="btn btn-sm btn-secondary">
                                Notifications
                            </button></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" />
                    <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.product.index') }}">Ürünleri
                        Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('admin.product.update', $product->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tag" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">SEO
                                Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detaylar" data-bs-toggle="pill" data-bs-target="#pills-contact"
                                type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Detaylar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image" data-bs-toggle="pill" data-bs-target="#pills-image"
                                type="button" role="tab" aria-controls="pills-image" aria-selected="false">Ürün
                                Görseli</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="renkler" data-bs-toggle="pill" data-bs-target="#pills-renkler"
                                type="button" role="tab" aria-controls="pills-renkler"
                                aria-selected="false">Renkler</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="form-group mb-3">
                                <label for="category_id">Ürün kategorisi</label>
                                <select name="category_id" class="form-select">
                                    <option value="" disabled selected>Ürün kategori seçiniz...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Ürün adı</label>
                                <input type="text" class="form-control text-dark" name="name"
                                    value="{{ $product->name }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $product->slug }}"
                                    autocomplete="slug" autofocus>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="brand">Ürün kategorisi</label>
                                <select name="brand" class="form-select">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}"
                                            {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="small_description">Açıklama</label>
                                <textarea type="text" class="form-control p-input @error('small_description') is-invalid @enderror"
                                    name="small_description" autocomplete="small_description" autofocus>{{ $product->small_description }}</textarea>
                                @error('small_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Ana Açıklama</label>
                                <textarea type="text" class="form-control p-input @error('description') is-invalid @enderror" name="description"
                                    autocomplete="description" autofocus>{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="seo-tag">
                            <div class="form-group mb-3">
                                <label for="meta_title">Meta Başlık</label>
                                <input type="text" value="{{ $product->meta_title }}"
                                    class="form-control p-input @error('meta_title') is-invalid @enderror"
                                    name="meta_title" autocomplete="meta_title" autofocus>
                                @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $meta_title }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Açıklaması</label>
                                <textarea type="text" class="form-control p-input @error('meta_description') is-invalid @enderror"
                                    name="meta_description" autocomplete="meta_description" autofocus>{{ $product->meta_description }}</textarea>
                                @error('meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Anahtarı</label>
                                <textarea type="text" class="form-control p-input @error('meta_keyword') is-invalid @enderror" name="meta_keyword"
                                    autocomplete="meta_keyword" autofocus>{{ $product->meta_keyword }}</textarea>
                                @error('meta_keyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="detaylar">
                            <div class="form-group">
                                <label for="original_price">Normal Fiyat</label>
                                <input type="number" value="{{ $product->original_price }}"
                                    class="form-control p-input @error('original_price') is-invalid @enderror"
                                    name="original_price" autocomplete="original_price" autofocus>
                                @error('original_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $original_price }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="selling_price">İndirimli Fiyat</label>
                                <input type="number" value="{{ $product->selling_price }}"
                                    class="form-control p-input @error('selling_price') is-invalid @enderror"
                                    name="selling_price" autocomplete="selling_price" autofocus>
                                @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $selling_price }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" value="{{ $product->quantity }}"
                                    class="form-control p-input @error('quantity') is-invalid @enderror" name="quantity"
                                    autocomplete="quantity" autofocus>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $quantity }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-1 float-start">
                                    <input type="checkbox" name="status" {{ $product->status == 1 ? 'checked' : '' }}
                                        class="btn-check" id="status" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="status">Status</label><br>
                                </div>

                                <div class="col-md-1">
                                    <input type="checkbox" name="trending" {{ $product->trending == 1 ? 'checked' : '' }}
                                        class="btn-check" id="trending" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="trending">Trending</label><br>
                                </div>
                                <small id="passwordHelpBlock" class="mb-5 form-text text-muted">
                                    Ürünün yayınlanmasını ve trend olmasını istiyorsanız kutucukları boş bırakınız.
                                </small>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="image">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cover">Ürün fotoğrafı</label>
                                        <input multiple="" type="file" class="form-control" name="image[]"
                                            id="cover" multiple>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $image }}</strong>
                                            </span>
                                        @enderror
                                        <div class="mt-4 text-center">
                                            @if ($product->productImages)
                                                <div class="row">
                                                    @foreach ($product->productImages as $image)
                                                        <div class="col-md-2">
                                                            <img src="{{ asset($image->image) }}"
                                                                class="me-6 border text-center"
                                                                style="width: 100px; height: 100px" alt="" />

                                                            <a href="{{ route('admin.product.images.delete', $image->id) }}"
                                                                style="width: 100px;"
                                                                class="mt-2 btn-icon-text btn btn-sm btn-block btn-danger"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <h5>Kaydedilen Resim Yok</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-renkler" role="tabpanel" aria-labelledby="renkler">
                            <h4>Ürün Rengi Ekle</h4>
                            <div class="row ">
                                @forelse ($colors as $color)
                                    <div class="col-md-3 d-flex justify-content-center mt-2 mb-3">
                                        <div class="p-2 border-5 border">
                                            <div class="form-group text-center">
                                                <input type="checkbox"
                                                    value="{{ $color->id }}" name="colors[{{ $color->id }}]"
                                                    class="btn-check" id="{{ $color->id }}">
                                                <label style="width: 150px" class="btn btn-outline-primary"
                                                    autocomplete="off"
                                                    for="{{ $color->id }}">{{ $color->name }}</label><br>
                                                <input class="mt-5" value="color_quantity[{{ $color->id }}]"
                                                    type="number"
                                                    name="color_quantity[{{ $color->id }}]"
                                                    style="width: 150px; border:1px solid">
                                                <label style="width: 200px" class="text-center"
                                                    for="colors">Stok</label><br>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <p>Renk bulunamadı</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="mb-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Renk</th>
                                                <th>Stok</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($product->productColors as $color)
                                                <tr class="productColorTR text-center">
                                                    <td>
                                                        @if ($color->color)
                                                            {{ $color->color->name }}
                                                        @else
                                                            <p>Renk bulunamadı</p>
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        <div class="input-group">
                                                            <input
                                                                class="updateProductColorQty form-control border-dark text-center"
                                                                type="number" value="{{ $color->quantity }}"
                                                                name="color_quantity[]" placeholder="Stok"
                                                                class="form-control name_list form-conrol-sm" />
                                                            <button type="button" value="{{ $color->id }}"
                                                                class="updateProductColorBtn border-dark btn btn-success btn-sm text-white">Güncelle</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $color->id }}"
                                                            name="add" id="add"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </td>
                                                @empty
                                                    <td colspan="3">
                                                        <p>Renk bulunamadı</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shadow  p-3 mb-5 bg-primary !spacing ">
                        <button type="submit" class="btn btn-light">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".updateProductColorBtn", function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest(".productColorTR").find(".updateProductColorQty").val();
                if (qty <= 0) {
                    alert("Stok alanı boş bırakılamaz");
                    return false;
                }
                var data = {
                    qty: qty,
                    product_id: product_id,
                    _token: "{{ csrf_token() }}"
                };
                $.ajax({
                    type: "POST",
                    url: "/admin/product/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message);
                    },
                });
            });
            $(document).on("click", ".deleteProductColorBtn", function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                $.ajax({
                    type: "GET",
                    url: "/admin/product/product-color/"+prod_color_id+"/delete",
                    success: function(response) {
                        thisClick.closest(".productColorTR").remove();
                        alert(response.message);
                    },
                });
            });
        });
    </script>

    {{-- // $(document).ready(function() {
        //     var i = 1;
        //     $('#add').click(function() {
        //         i++;
        //         $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="surname[]" placeholder="Enter your Surname" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        //     });
        //     $(document).on('click', '.btn_remove', function() {
        //         var button_id = $(this).attr("id");
        //         $('#row' + button_id + '').remove();
        //     });
        //     $('#submit').click(function() {
        //         $.ajax({
        //             url: "name.php",
        //             method: "POST",
        //             data: $('#add_name').serialize(),
        //             success: function(data) {
        //                 alert(data);
        //                 $('#add_name')[0].reset();
        //             }
        //         });
        //     });
        // }); --}}
@endpush
