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
                            <th>EMPRESA</th>
                            <th>SUBCONTRATA</th>
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>LUGAR DE PROCEDENCIA</th>
                            <th>FECHA DE ATENCIÓN</th>
                            <th>ESTADO</th>
                            <th>MEDICINA</th>
                            <th>IMPRESIÓN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">{{ $order->client->name }}</td>
                                @if($order->subclient_id)
                                    <td class="text-center">{{ $order->subclient->name }}</td>
                                @else
                                    <td class="text-center"></td>
                                @endif
                                <td class="text-center">{{ $order->patient->name }}, {{ $order->patient->lastname }}</td>

                                <td class="text-center">
                                    <span class="badge badge-outline-info">{{ $order->patient->origin }}</span>
                                </td>

                                <td class="text-center">{{ $order->created_at }}</td>

                                @if($order->medicine->temperature && $order->medicine->fc && $order->medicine->spo2 && $order->patient->image)
                                    <td>
                                        <span class="badge badge-success">COMPLETADO</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge badge-warning">EN PROCESO</span>
                                    </td>
                                @endif

                                <td class="text-center">
                                    @can('Auditoria_update')
                                    <a href="{{ route('form.medicina', $order->medicine->id) }}" class="btn btn-outline-secondary" target="_top"><i class="fas fa-file-medical"></i></a>
                                    @endcan
                                </td>

                                <td class="text-center">
                                    @can('Auditoria_print')
                                        @if($order->medicine->temperature && $order->medicine->fc && $order->medicine->spo2 && $order->patient->image)
                                            <a href="{{ route('historia', $order) }}" class="btn btn-outline-success" target="_blank"></a>
                                        @else
                                            <div>
                                                <i class="text-info far fa-clock fa-2x"></i>
                                            </div>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

