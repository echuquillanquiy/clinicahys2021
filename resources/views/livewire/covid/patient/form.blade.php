@include('common.modalHead')

<div class="row">
    <div class="col-xl-3">
        <div class="form-group">
            <label class="control-label">DNI:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                </div>
                <input type="text" wire:model.lazy="dni" class="form-control" >
            </div>
            @error('dni')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label class="control-label">NOMBRES COMPLETOS:</label>
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

    <div class="col-xl-5">
        <div class="form-group mb-4">
            <label class="control-label">APELLIDOS COMPLETOS:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="lastname" class="form-control" >
            </div>
            @error('lastname')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-4">
        <div class="form-group mb-4">
            <label class="control-label">FECHA DE NACIMIENTO:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                </div>
                <input type="date" wire:model.lazy="birthday" wire:keydown="calcEdad()" class="form-control" >
            </div>
            @error('birthday')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-2">
        <div class="form-group mb-4">
            <label class="control-label">EDAD:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
                </div>
                <input type="text" wire:model.lazy="age" class="form-control text-center" >
            </div>
            @error('age')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
