@include('common.modalHead')

<div class="row">

    <div class="col-xl-4">
        <div class="form-group">
            <label>ESTADO</label>
            <select wire:model.lazy="type" class="form-control">
                <option value="Elegir">[Elegir]</option>
                <option value="ANTIGENO">ANTIGENO</option>
                <option value="RÁPIDA">RÁPIDA</option>
                <option value="MOLECULAR">MOLECULAR</option>
            </select>
        </div>
        @error('type')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label>ESTADO</label>
            <select wire:model.lazy="result" class="form-control">
                <option value="Elegir">[Elegir]</option>
                <option value="POSITIVO">POSITIVO</option>
                <option value="NEGATIVO">NEGATIVO</option>
                <option value="NO APLICA">NO APLICA</option>
            </select>
        </div>
        @error('result')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label class="control-label">Usuario:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="userName" class="form-control" disabled>
            </div>
            @error('userName')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
