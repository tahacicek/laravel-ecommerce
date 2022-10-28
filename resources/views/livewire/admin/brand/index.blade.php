<div>
 @include("livewire.admin.brand.modal-form")
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Markalar</h2>
                        <p class="mb-md-0">Bu sayfada markalar görüntüleniyor.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Markalar&nbsp;/&nbsp;</p>
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
                    <a class="btn btn-primary mt-2 mt-xl-0" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                        href="{{ route('admin.brand.create') }}">Marka Oluştur</a>
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
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Category </th>
                                    <th> Slug </th>
                                    <th> Status </th>
                                    <th> İşlemler </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr class="text-center">
                                        <td> {{ $brand->id }} </td>
                                        <td> {{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->category_id)
                                                {{ $brand->category->name }}
                                                @else
                                                <span class="badge bg-danger">Kategori Yok</span>
                                            @endif
                                            </td>
                                        <td> {{ $brand->slug }} </td>
                                        <td> {{ $brand->status == 1 ? 'Pasif' : 'Yayında' }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#updateBrandModal" href="edit"
                                            wire:click="editBrand({{ $brand->id }})"  class="btn btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="delete" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                                wire:click="deleteBrand({{ $brand->id }})" class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="5">Kayıt Bulunamadı</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end mt-1">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#deleteclick').click(function() {
                $('#addBrandModal').modal('hide');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#deleteclick').click(function() {
                $('#updateBrandModal').modal('hide');
            });
        });
    </script>
@endpush
