@include('common.modalHead')

<div class="row">
    <div class="col-xl-5">
        <div class="form-group">
            <label class="control-label">RUC:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-edit"></i></div>
                </div>
                <input type="text" wire:model="ruc" class="form-control" >
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
                <input type="text" wire:model="name" class="form-control" >
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
                <input type="text" wire:model="address" class="form-control" >
            </div>
            @error('address')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group col-xl-4">
        <label for="inputState">Departamentos</label>
        <select wire:model="selectedDepartment" class="form-control">
            <option value="">[Seleccione]</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
        @error('selectedDepartment')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    @if(!is_null($provinces))
        <div class="form-group col-xl-4">
            <label for="inputState">Provincias</label>
            <select wire:model="selectedProvince" class="form-control">
                <option value="">[Seleccione]</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
            @error('selectedProvince')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    @endif

    @if(!is_null($districts))
        <div class="form-group col-xl-4">
            <label for="inputState">Distritos</label>
            <select wire:model="selectedDistrict" class="form-control">
                <option value="">[Seleccione]</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>

            @error('selectedDistrict')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    @endif

</div>

@include('common.modalFooter')
