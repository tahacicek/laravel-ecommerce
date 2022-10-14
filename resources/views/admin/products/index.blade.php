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
                <form class="forms-sample" method="POST" action="{{ route('admin.product.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ürün adı</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Ürün fiyatı</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="details">Ürün detayı</label>
                        <textarea rows="5" class="form-control" name="details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Ürün fotoğrafı</label>
                        <input multiple="" type="file" accept=".jpg,.gif,.png,.bmp,.jpeg"
                            class="form-control inputfile d-none" name="cover" id="cover">
                        <label for="cover" id="cover-label">
                            Şimdilik fotoğraf seçin!
                        </label>
                        <style>
                            .forms-sample .inputfile:focus~label {
                                outline: 1px dotted #000;
                                outline: -webkit-focus-ring-color auto 5px;
                            }
                        </style>
                    </div>
                    <div class="form-group">
                        <label for="categories">Ürün kategorisi</label>
                        <select name="category_id" class="form-control">
                            <option value=""></option>
                            <option value="1">Beyaz Eşya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="text" class="form-control" name="stock">
                    </div>
                    <div class="form-group">
                        <label for="stock_open">Stok Adeti</label>
                        <input type="text" class="form-control" name="stock_open">
                    </div>
                    <div class="form-group">
                        <label for="preorder">Ön sipariş</label>
                        <input type="text" class="form-control" name="preorder">
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Oluştur</button>
            </form>
        </div>
    </div>
    </div>
@endsection
