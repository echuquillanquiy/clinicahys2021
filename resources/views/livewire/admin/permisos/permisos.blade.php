<div>
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $pageTitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $componentName }}</a></li>
            </ol>
        </nav>

        @can('Permiso_create')
        <div class="dropdown filter custom-dropdown-icon">
            <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#theModal"><i class="fas fa-user-tag"></i> Nueva permiso</a>
        </div>
        @endcan
    </div>

    <div class="row">
        <div class="w-100 mt-3 col-xl-11">
            <input type="text" wire:model="search" class="w-100 form-control product-search br-30" id="input-search" placeholder="Buscar..." >
        </div>

        <div class="w-100 col-xl-1 mt-3">
            <select class="form-control" wire:model="pageSelected">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>DESCRIPCION</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permisos as $permiso)
                            <tr>
                                <td class="text-center">{{ $permiso->id }}</td>
                                <td class="text-center">{{ $permiso->name }}</td>
                                <td class="text-center">
                                    @can('Permiso_update')
                                    <a href="javascript:void(0);" wire:click="Edit({{ $permiso->id }})"  data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit text-warning fa-lg btn btn-outline-warning"></i></a>
                                    @endcan
                                    @can('Permiso_destroy')
                                        <a href="javascript:void(0);"  onclick="Confirm('{{ $permiso->id }}')" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt text-danger fa-lg btn btn-outline-danger"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $permisos->links() }}
            </div>
            @include('livewire.admin.permisos.form')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('permisos-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        });

        window.livewire.on('permisos-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        });

        window.livewire.on('permisos-deleted', Msg => {
            noty(Msg)
        });

        window.livewire.on('permisos-exists', Msg => {
            noty(Msg)
        });

        window.livewire.on('permisos-error', Msg => {
            noty(Msg)
        });

        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')
        });
    });

    function Confirm(id)
    {
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar',
        }).then(function (result){
            if (result.value){
                window.livewire.emit('destroy', id)
                swal.close()
            }
        })
    }
</script>
