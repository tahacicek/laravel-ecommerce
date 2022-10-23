@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Slider</h2>
                        <p class="mb-md-0">Bu sayfada slider oluşturuluyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="text-dark" href="">Slider</a>
                        </p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.slider.create') }}">Slider Ekle</a>
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
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Slider Başlık</label>
                        <input type="text" value="{{ $slider->title }}"
                            class="form-control p-input @error('title') is-invalid @enderror" name="title"
                            autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Slider Açıklama</label>
                        <textarea class="form-control p-input @error('description') is-invalid @enderror" name="description" id="description"
                            rows="3">{{ $slider->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($slider->image) }}" class="mx-auto d-block" width="250px" height="250px" alt="">
                        <label for="image">Slider Resim</label>
                        <input type="file" name="image"
                            class="form-control p-input @error('title') is-invalid @enderror" id="image">
                    </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group ">
                        <input type="checkbox" name="status" {{ $slider->status == 1 ? 'checked': '' }} class="btn-check" id="status" autocomplete="off">
                        <label class="btn btn-outline-primary" for="status">Status</label><br>
                        <small id="passwordHelpBlock" class="mb-5 form-text text-muted">
                            Ürünün yayınlanmasını ve trend olmasını istiyorsanız kutucukları boş bırakınız.
                        </small>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
