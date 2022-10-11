@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Kategori</h2>
                        <p class="mb-md-0">Bu sayfada kategoriler görüntüleniyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Kategoriler&nbsp;/&nbsp;</p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.category.create') }}">Kategori Oluştur</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <p class="card-description"> Add class <code>.table-striped</code> </p>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th> Id </th>
                                    <th> Kategori Görseli </th>
                                    <th> Kategori Adı </th>
                                    <th> Kategori Açıklaması </th>
                                    <th> Status </th>
                                    <th> İşlemler </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="text-center">
                                        <td> {{ $category->id }} </td>
                                        <td>
                                            @if ($category->image)
                                                <img src="{{ asset('/uploads/category/'. $category->image) }}" class="img-responsive"
                                                style="width: 100px; height: 100px;" alt="image" />
                                            @else
                                                Görsel Yok
                                            @endif

                                        </td>
                                        <td> {{ $category->name }} </td>
                                        <td> {{ $category->description }}</td>
                                        <td> {{ $category->status }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a> <a href="" class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
