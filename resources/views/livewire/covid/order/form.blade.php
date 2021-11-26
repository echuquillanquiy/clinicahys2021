@include('common.modalHead')

<div class="row">
    <input type="hidden" wire:model="patientId" class="form-control uppercase" disabled>
    @if($selected_id < 1)
        <div class="col-xl-3">
            <div class="form-group">
                <label class="control-label">DNI:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model.lazy="dni" wire:change.prevent="consultDni()" class="form-control uppercase" required>
                </div>
                @error('patientId')
                <span class="text-danger er">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="form-group">
                <label class="control-label">NOMBRES:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model="name" class="form-control uppercase" >
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="form-group">
                <label class="control-label">APELLIDOS:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model="lastname" class="form-control uppercase" >
                </div>
            </div>
        </div>
    @else
        <input type="hidden" wire:model="patientId" class="form-control uppercase" disabled>
        <div class="col-xl-3">
            <div class="form-group">
                <label class="control-label">DNI:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model="dni" wire:focus="dni" wire:init="editDni()" class="form-control uppercase" disabled>
                </div>
                @error('dni')
                <span class="text-danger er">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="form-group">
                <label class="control-label">NOMBRES:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model="name" wire:init="editDni()" class="form-control uppercase" disabled>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="form-group">
                <label class="control-label">APELLIDOS:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-edit"></i></div>
                    </div>
                    <input type="text" wire:model="lastname" wire:init="editDni()" class="form-control uppercase" disabled>
                </div>
            </div>
        </div>
    @endif

    <div class="col-xl-3">
        <div class="form-group">
            <label>EMPRESAS</label>
            <select wire:model.lazy="clientId" class="form-control">
                <option value="Elegir">[Elegir]</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        @error('clientId')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-3">
        <div class="form-group">
            <label>SUBCONTRATA</label>
            <select wire:model.lazy="subclientId" class="form-control">
                <option value="Elegir">[Elegir]</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        @error('subclientId')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-3">
        <div class="form-group">
            <label>PUESTOS</label>
            <select wire:model.lazy="positionId" class="form-control">
                <option value="Elegir">[Elegir]</option>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        @error('positionId')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-3">
        <div class="form-group">
            <label>PRUEBA</label>
            <select wire:model.lazy="testId" class="form-control">
                <option value="Elegir">[Elegir]</option>
                @foreach($tests as $test)
                    <option value="{{ $test->id }}">{{ $test->brand }}</option>
                @endforeach
            </select>
        </div>
        @error('testId')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

</div>

@include('common.modalFooter')
