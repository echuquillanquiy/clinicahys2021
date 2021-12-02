@include('common.modalHead')

<div class="row">
    <div class="col-xl-5">
        <div class="form-group">
            <label class="control-label">NOMBRES Y APELLIDOS:</label>
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

    <div class="col-xl-7">
        <div class="form-group">
            <label class="control-label">CORREO ELECTRONICO:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model.lazy="email" class="form-control" >
            </div>
            @error('email')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label>ESTADO</label>
            <select wire:model.lazy="status" class="form-control">
                <option value="Elegir">[Elegir]</option>
                <option value="Active">Activo</option>
                <option value="Locked">Bloqueado</option>
            </select>
        </div>
        @error('status')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label>Asignar Perfil/Role</label>
            <select wire:model.lazy="profile" class="form-control">
                <option value="Elegir">[Elegir]</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @error('profile')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-4">
        <div class="form-group">
            <label>SEDE:</label>
            <select wire:model.lazy="place" class="form-control">
                <option value="Elegir">[Elegir]</option>
                <option value="HUANCAYO">HUANCAYO</option>
                <option value="HUANCAVELICA">HUANCAVELICA</option>
                <option value="TODOS">TODOS</option>
            </select>
        </div>
        @error('place')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-7">
        <div class="form-group">
            <label class="control-label">CONTRASEÑA:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="password" wire:model.lazy="password" class="form-control" >
            </div>
            @error('password')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>


</div>

@include('common.modalFooter')
