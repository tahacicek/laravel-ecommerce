@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Ürünler</h2>
                        <p class="mb-md-0">Bu sayfada kategori oluşturuluyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="text-dark"
                                href="{{ route('admin.product.index') }}">Kategoriler</a>&nbsp;/&nbsp;Oluştur</p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.product.index') }}">Kategorileri
                        Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                {{-- <form class="forms-sample" method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                    @error('product_name')
                        has-danger
                    @enderror
                    ">
                        <label for="product_name">Ad</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" placeholder="Ürün adını giriniz...">
                        @error('product_name')
                            <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group
                    @error('description')
                        has-danger
                    @enderror
                    ">
                        <label  for="description">Açıklama</label>
                        <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group
                    @error('price')
                        has-danger
                    @enderror
                    ">
                        <label for="price">Fiyat</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price">
                        @error('price')
                            <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">Dosya Seç</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Dosya Yükle</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">Dosya Seç</label>
                        <input type="file" name="photos[]" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Galeri Modu</button>
                            </span>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">kaydet</button>
                    <button href="#" class="btn btn-light">Vazgeç</button>
                </form> --}}
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
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form-group mb-3">
                            <label for="categories_id">Ürün kategorisi</label>
                            <select name="category_id" class="form-select">
                                <option value="" disabled selected>Ürün kategori seçiniz...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Ürün adı</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Ürün fiyatı</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand">Ürün kategorisi</label>
                            <select name="brand" class="form-select">
                                <option value="" disabled selected>Ürün kategori seçiniz...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}">
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="small_description">small_description</label>
                            <textarea type="text" class="form-control p-input @error('small_description') is-invalid @enderror"
                                name="small_description" autocomplete="small_description" autofocus></textarea>
                            @error('small_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea type="text" class="form-control p-input @error('description') is-invalid @enderror" name="description"
                                autocomplete="description" autofocus></textarea>
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
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Açıklaması</label>
                            <textarea type="text" class="form-control p-input @error('meta_description') is-invalid @enderror"
                                name="meta_description" autocomplete="meta_description" autofocus></textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">Meta Anahtarı</label>
                            <textarea type="text" class="form-control p-input @error('meta_keyword') is-invalid @enderror"
                                name="meta_keyword" autocomplete="meta_keyword" autofocus></textarea>
                            @error('meta_keyword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Ürün adı</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="detaylar">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="switch">Status</label>
                                    <input type="checkbox" name="status" style="width: 50px; height: 50px">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
