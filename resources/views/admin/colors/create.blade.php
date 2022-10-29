@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Renk</h2>
                        <p class="mb-md-0">Bu sayfada renk oluşturuluyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="text-dark"
                                href="{{ route('admin.color.index') }}">Renkler</a>&nbsp;/&nbsp;Oluştur</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.product.index') }}">Ürünleri Görüntüle</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Renk Oluştur</h4>
                    <form class="forms-sample" action="{{ route('admin.color.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Renk Adı</label>
                            <input type="text" value="{{ old('name') }}"
                            class="form-control p-input @error('name') is-invalid @enderror"
                            name="name" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $name }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">Renk Kodu</label>
                            <input type="color" value="{{ old('code') }}"
                            class="form-control p-input @error('code') is-invalid @enderror"
                            name="code" autocomplete="code" autofocus>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $code }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                                <input type="checkbox" name="status" class="btn-check" id="status"
                                    autocomplete="off">
                                <label class="btn btn-outline-primary" for="status">Status</label><br>
                                <small id="passwordHelpBlock" class="mb-5 form-text text-muted">
                                    Ürünün yayınlanmasını ve trend olmasını istiyorsanız kutucukları boş bırakınız.
                                </small>
                        </div>
                     <div class="float-end">
                        <button type="submit" class="btn btn-success mr-2">Oluştur</button>
                        <button class="btn btn-secondary">İptal</button>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
