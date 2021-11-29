@include('common.modalHead')

<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label class="control-label">DESCRIPCIÓN:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="permissionName" class="form-control" >
            </div>
            @error('permissionName')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
