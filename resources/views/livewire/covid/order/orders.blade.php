<div>
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $pageTitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $componentName }}</a></li>
            </ol>
        </nav>
        <div class="dropdown filter custom-dropdown-icon">
            <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#theModal"><i class="fas fa-file-medical"></i> Nueva Orden Covid</a>
        </div>
    </div>

    <div class="row">
        <div class="w-100 mt-3 col-xl-8">
            <input type="text" wire:model="search" class="w-100 form-control product-search br-30" id="input-search" placeholder="Buscar..." >
        </div>

        <div class="w-100 mt-3 col-xl-3">
            <input type="date" wire:model="dateFilter" class="w-100 form-control product-search br-30">
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
                            <th>FECHA</th>
                            <th>EMPRESA</th>
                            <th>SUBCONTRATA</th>
                            <th>PACIENTE</th>
                            <th>PUESTO</th>
                            <th>PRUEBA</th>
                            <th>Encargado</th>
                            <th class="text-center w-25">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">{{ $order->created_at }}</td>
                                <td class="text-center">{{ $order->client->name }}</td>
                                <td class="text-center">{{ $order->subclient->name }}</td>
                                <td class="text-center">{{ $order->patient->name }}, {{ $order->patient->lastname }}</td>
                                <td class="text-center">{{ $order->position->name }}</td>
                                <td class="text-center">{{ $order->test->brand }}</td>
                                <td class="text-center">{{ $order->user->name }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" wire:click="Edit({{ $order->id }})"  data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit text-warning fa-lg btn btn-outline-warning"></i></a>
                                    <a href="javascript:void(0);" onclick="Confirm('{{ $order->id }}')" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt text-danger fa-lg btn btn-outline-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
            @include('livewire.covid.order.form')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('order-added', msg => {
            $('#theModal').modal('hide')

        });

        window.livewire.on('order-exists', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        });

        window.livewire.on('order-updated', Msg => {
            $('#theModal').modal('hide')
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

