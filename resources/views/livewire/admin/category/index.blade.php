    <div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategoriyi Sil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyCategory">
                        <div class="modal-body">
                          <h6>Kategoriyi silmek istediğinize emin misiniz?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button id="deleteclick" type="submit" class="btn btn-primary">Evet, sil.</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <a class="btn btn-primary mt-2 mt-xl-0" href="{{ route('admin.category.create') }}">Kategori
                            Oluştur</a>
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
                                                    <img src="{{ asset('/uploads/category/' . $category->image) }}"
                                                        class="img-responsive" style="width: 100px; height: 100px;"
                                                        alt="image" />
                                                @else
                                                    Görsel Yok
                                                @endif

                                            </td>
                                            <td> {{ $category->name }} </td>
                                            <td> {{ $category->description }}</td>
                                            <td> {{ $category->status == 1 ? 'Pasif' : 'Yayında' }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    wire:click="deleteCategory({{ $category->id }})"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-end mt-1">
                                {{ $categories->links() }}
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
            $('#deleteModal').modal('hide');
        });
    </script>
    <script>
       $(document).ready(function(){
           $('#deleteclick').click(function(){
               $('#deleteModal').modal('hide');
           });
       });

    </script>


@endpush
