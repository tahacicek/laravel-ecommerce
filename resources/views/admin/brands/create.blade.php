@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Kategori</h2>
                        <p class="mb-md-0">Bu sayfada kategori oluşturuluyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="text-dark" href="{{ route("admin.category.index") }}">Kategoriler</a>&nbsp;/&nbsp;Oluştur</p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.category.index') }}">Kategorileri Görüntüle</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control p-input @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                    placeholder="Category name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control p-input @error('slug') is-invalid @enderror"
                                    name="slug" value="{{ old('slug') }}" autocomplete="slug" autofocus
                                    placeholder="Category slug">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control p-input @error('description') is-invalid @enderror" name="description"
                                   autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">İmage</label>
                                <input type="file" class="form-control p-input @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') }}" autocomplete="image" autofocus
                                    placeholdher="Category image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            <h5 class="text-center">
                                Seo Attributes
                            </h5>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input type="text"
                                    class="form-control p-input @error('meta_keyword') is-invalid @enderror"
                                    name="meta_keyword" value="{{ old('meta_keyword') }}" autocomplete="meta_keyword"
                                    autofocus placeholder="meta_keyword">
                                @error('meta_keyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text"
                                    class="form-control p-input @error('meta_description') is-invalid @enderror"
                                    name="meta_description" value="{{ old('meta_description') }}"
                                    autocomplete="meta_description" autofocus placeholder="Meta Description">
                                @error('meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control p-input @error('meta_title') is-invalid @enderror"
                                    name="meta_title" value="{{ old('meta_title') }}" autocomplete="meta_title" autofocus
                                    placeholder="Meta Title">
                                @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-check-primary mt-5">
                                <label class="" for="status">Status</label>
                                <input type="checkbox"
                                    class="col-md-4 form-check-input p-input @error('status') is-invalid @enderror"
                                    name="status" value="1" autocomplete="status" autofocus
                                    placeholder="Category status">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block  float-end ">Add Category</button>
                            {{-- <button class="btn btn-light  float-end "
                                onclick="location.href = ' [[ route('admin.category.index') ]] '; return false;">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- content-wrapper ends --}}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        function init() {
            // On click of maximize, switch data attribute of window-content and covert whole row into column.
            $("[data-widget='maximize']").click(function() {
                var $overlay = $('.custom-overlay');
                var $content = $('.row-content');
                if ($overlay.is(':visible')) {
                    $content.toggleClass('row-content column-content');
                    $('.main-panel').toggleClass('main-panel-full custom-overlay');
                } else {
                    $('.main-panel').toggleClass('main-panel-full custom-overlay');
                    $content.toggleClass('row-content column-content');
                }
            });

            feather.replace();
        }
        window.onload = init;
    </script>
@endsection
