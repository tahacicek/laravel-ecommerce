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
                                href="">Kategoriler</a></p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.product.create') }}">Kategori Ekle</a>
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
                            <th> ID </th>
                            <th> Kategori Adı </th>
                            <th> Ürün Adı </th>
                            <th> Fiyat </th>
                            <th> Stok </th>
                            <th> Statu </th>
                            <th> İşlemler </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="text-center">
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->category_id)
                                        {{ $product->category->name }}
                                    @else
                                        Kategori Yok
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == 1 ? 'Pasif' : 'Yayında' }}</td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a  href="{{ route('admin.product.delete', $product->id) }}"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="7" class="text-center">Kayıt Bulunamadı</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
      $('#something').click( function() { alert('clicked'); });
    </script>
@endpush
