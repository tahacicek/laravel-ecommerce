<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Marka Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id" require dclass="form-label">Kategori</label>
                        <select wire:model.defer="category_id" class="form-select form-select-sm" name="" id="">
                            <option selected>Lütfen kategori seçiniz..</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Marka ismi</label>
                        <input type="text" wire:model.defer="name"
                            class="form-control p-input @error('name') is-invalid @enderror" nZame="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Marka ismi">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Marka Slug</label>
                        <input type="text" class="form-control p-input @error('slug') is-invalid @enderror"
                            name="slug" wire:model.defer="slug" value="{{ old('slug') }}" autocomplete="slug"
                            autofocus placeholder="Marka slug">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group form-check-primary mt-2">
                        <label class="" for="status">Durum</label>
                        <input wire:model.defer="status" type="checkbox"
                            class="col-md-4 form-check-input p-input @error('status') is-invalid @enderror"
                            name="status" value="1" autocomplete="status" autofocus placeholder="Category status">
                        <div id="status" class="form-text">
                            Marka yayınlanmayacaksa işaretleyin.
                        </div>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Güncellenen Marka:   {{ $this->name }}</h5>
                <button type="button" class="btn-close" wire:clik="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="text-center mt-3 mb-3">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id" require dclass="form-label">Kategori</label>
                            <select wire:model.defer="category_id" class="form-select form-select-sm" name="" id="">
                                <option>Lütfen kategori seçiniz..</option>
                                @foreach ($categories as $category)
                                    <option @if ($category->id == $this->category_id) selected @endif value="{{ $category->id }}">
                                        {{ $category->name }}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Marka ismi</label>
                            <input type="text" wire:model.defer="name"
                                class="form-control p-input @error('name') is-invalid @enderror" nZame="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Marka ismi">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Marka Slug</label>
                            <input type="text" class="form-control p-input @error('slug') is-invalid @enderror"
                                name="slug" wire:model.defer="slug" value="{{ old('slug') }}" autocomplete="slug"
                                autofocus placeholder="Marka slug">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-check-primary mt-2">
                            <label class="" for="status">Durum</label>
                            <input wire:model.defer="status" type="checkbox"
                                class="col-md-4 form-check-input p-input @error('status') is-invalid @enderror"
                                name="status" value="1" autocomplete="status" autofocus
                                placeholder="Category status">
                            <div id="status" class="form-text">
                                Marka yayınlanmayacaksa işaretleyin.
                            </div>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:clik="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"  id="exampleModalLabel">Silinen Marka: {{ $this->name }}</h4>
                <button type="button" class="btn-close" wire:clik="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="text-center mt-3 mb-3">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h5>Markayı silmek istediğinize emin misinz?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:clik="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">İptal</button>
                        <button id="deleteclick" type="submit" class="btn btn-primary">Evet, sil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
