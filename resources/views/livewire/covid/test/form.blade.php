@include('common.modalHead')

<div class="row">
    <div class="col-xl-4">
        <div class="form-group">
            <label class="control-label">LOTE:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="lot" class="form-control" >
            </div>
            @error('lot')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label class="control-label">MARCA:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="brand" class="form-control" >
            </div>
            @error('brand')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label>ESTADO</label>
            <select wire:model.lazy="status" class="form-control">
                <option value="Elegir">[Elegir]</option>
                <option value="VIGENTE">VIGENTE</option>
                <option value="CADUCADO">CADUCADO</option>
            </select>
        </div>
        @error('status')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

</div>

@include('common.modalFooter')
