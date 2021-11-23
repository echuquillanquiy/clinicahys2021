@include('common.modalHead')

<div class="row">
    <div class="col-xl-5">
        <div class="form-group">
            <label class="control-label">RUC:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="ruc" class="form-control" >
            </div>
            @error('ruc')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-7">
        <div class="form-group">
            <label class="control-label">RAZÓN SOCIAL:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="name" class="form-control" >
            </div>
            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-12">
        <div class="form-group mb-4">
            <label class="control-label">DIRECCIÓN:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="address" class="form-control" >
            </div>
            @error('address')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
