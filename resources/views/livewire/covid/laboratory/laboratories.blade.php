<div>
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $pageTitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $componentName }}</a></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="w-100 mt-3 col-xl-7">
            <input type="text" wire:model="search" class="w-100 form-control product-search br-30" id="input-search" placeholder="Buscar..." >
        </div>
        <div class="w-100 mt-3 col-xl-3">
            <input type="date" wire:model="dateFilter" class="w-100 form-control product-search br-30">
        </div>
        <div class="w-100 col-xl-2 mt-3">
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
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>TIPO DE PRUEBA</th>
                            <th>RESULTADO</th>
                            <th>USUARIO QUE REGISTRA RESULTADO</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($laboratories as $laboratory)
                            <tr>
                                <td class="text-center">{{ $laboratory->id }}</td>
                                <td class="text-center">{{ $laboratory->created_at }}</td>
                                <td class="text-center">{{ $laboratory->order->client->name }}</td>
                                @if($laboratory->order->subclient_id)
                                    <td class="text-center">{{ $laboratory->order->subclient->name  }}</td>
                                @else
                                    <td class="text-center"></td>
                                @endif
                                <td class="text-center">{{ $laboratory->order->patient->name }}, {{ $laboratory->order->patient->lastname }}</td>
                                <td class="text-center">{{ $laboratory->type }}</td>
                                <td class="text-center">
                                    @if( $laboratory->result != 'NEGATIVO')
                                        <a href="javascript:void(0)" wire:click.prevent="updateResult" class="text-center badge badge-danger">{{ $laboratory->result }}</a>
                                    @else
                                        <a href="javascript:void(0)" href="#" class="text-center badge badge-success">{{ $laboratory->result }}</a>
                                    @endif
                                </td>

                                <th class="text-center">{{ $laboratory->order->user->name }}</th>
                                <td class="text-center">
                                    @can('Laboratorio_update')
                                    <a href="javascript:void(0);" wire:click="Edit({{ $laboratory->id }})" title="Registrar" data-toggle="modal" data-target="#theModal" class="btn btn-outline-secondary">Registrar Resultado</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $laboratories->links() }}
            </div>
            @include('livewire.covid.laboratory.form')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('laboratory-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        });
    });
</script>

