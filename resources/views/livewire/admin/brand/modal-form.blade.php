<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marka Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
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
                    <div class="form-group form-check-primary mt-5">
                        <label class="" for="status">Durum</label>
                        <input wire:model.defer="status" type="checkbox"
                            class="col-md-4 form-check-input p-input @error('status') is-invalid @enderror"
                            name="status" value="1" autocomplete="status" autofocus placeholder="Category status">
                        <div id="status" class="form-text">
                            Marka aktif olacaksa işaretleyin.
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
