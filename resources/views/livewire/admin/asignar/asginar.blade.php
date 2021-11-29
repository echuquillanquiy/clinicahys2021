    <div>
        <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $componentName }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <div class="form-inline">
                        <div class="form-group mr-5">
                            <select wire:model="role" class="form-control">
                                <option value="Elegir" selected>Seleccione el Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button wire:click.prevent="SyncAll()" type="button" class="btn btn-secondary inline-block mr-5">Sincronizar todos</button>
                        <button onclick="Revocar()" type="button" class="btn btn-secondary mr-5">Revocar todos</button>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="text-center">#</th>
                                        <th class="text-center">PERMISO</th>
                                        <th class="text-center">ROLES CON EL PERMISOL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permisos as $permiso)
                                        <tr>
                                            <td><h6 class="text-center">{{ $permiso->id }}</h6></td>
                                            <td class="text-center">
                                                <div class="n-check">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox"
                                                               wire:change="syncPermiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}' )"
                                                               id="p{{ $permiso->id }}"
                                                               value="{{ $permiso->id }}"
                                                               class="new-control-input"
                                                            {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                        >
                                                        <span class="new-control-indicator"></span>
                                                        <h6>{{ $permiso->name }}</h6>
                                                    </label>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $permisos->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function (){
            window.livewire.on('sync-error', Msg => {
                noty(Msg)
            })

            window.livewire.on('permi', Msg => {
                noty(Msg)
            })

            window.livewire.on('syncall', Msg => {
                noty(Msg)
            })

            window.livewire.on('removeall', Msg => {
                noty(Msg)
            })
        });


        function Revocar(id)
        {
            swal({
                title: 'CONFIRMAR',
                text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cerrar',
                cancelButtonColor: '#fff',
                confirmButtonColor: '#3B3F5C',
                confirmButtonText: 'Aceptar',
            }).then(function (result){
                if (result.value){
                    window.livewire.emit('revokeall')
                    swal.close()
                }
            })
        }

    </script>
