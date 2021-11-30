<div>
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $pageTitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $componentName }}</a></li>
            </ol>
        </nav>
        @can('Usuario_create')
        <div class="dropdown filter custom-dropdown-icon">
            <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#theModal"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
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
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>CORREO ELECTRONICO</th>
                            <th>PERFIL</th>
                            <th>SELLO</th>
                            <th>ESTADO</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->profile }}</td>
                                <td class="text-center">
                                    @if($user->photo_profile_url = null)
                                        <span class="badge badge-danger"> NO </span>
                                    @else
                                        <span class="badge badge-success"> SI </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($user->status == 'Active')
                                        <i class="fas fa-lock-open text-success fa-lg"></i>
                                    @else
                                        <i class="fas fa-lock text-danger fa-lg"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @can('Usuario_update')
                                    <a href="javascript:void(0);" wire:click="Edit({{ $user->id }})"  data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit text-warning fa-lg btn btn-outline-warning"></i></a>
                                    @endcan

                                    @can('Usuario_destroy')
                                    <a href="javascript:void(0);"  onclick="Confirm('{{ $user->id }}', '{{ $user->orders->count() }}')" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt text-danger fa-lg btn btn-outline-danger"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
            @include('livewire.admin.user.form')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('user-added', msg => {
            $('#theModal').modal('hide')
        });

        window.livewire.on('user-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        });
        window.livewire.on('user-deleted', Msg => {
            noty(Msg)
        });

        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        });

        window.livewire.on('user-withorders', Msg => {
            noty(Msg)
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
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
