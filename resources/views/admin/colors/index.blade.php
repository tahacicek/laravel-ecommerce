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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a class="text-dark" href="#">Renkler</a></p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.color.create') }}">Renk Oluştur</a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th> # </th>
                            <th> Renk Adı </th>
                            <th> Renk Kodu </th>
                            <th> Durum </th>
                            <th> İşlemler </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($colors as $color)
                            <tr>
                                <td> {{ $color->id }} </td>
                                <td> {{ $color->name }} </td>
                                <td> {{ $color->code }} </td>
                                <td>
                                    <label class="badge rounded-pill bg-{{ $color->status == 1 ? 'danger' : 'success' }}">
                                        {{ $color->status == 1 ? 'Pasif' : 'Aktif' }}
                                    </label>

                                <td>
                                    <a href="{{ route('admin.color.edit', $color->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.color.delete', $color->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


