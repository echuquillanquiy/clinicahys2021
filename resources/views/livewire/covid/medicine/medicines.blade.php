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
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>LUGAR DE PROCEDENCIA</th>
                            <th>USUARIO QUE REGISTRA RESULTADO</th>
                            <th>Resultados</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicines as $medicine)
                            <tr>
                                <td class="text-center">{{ $medicine->id }}</td>
                                <td class="text-center">{{ $medicine->created_at }}</td>
                                <td class="text-center">{{ $medicine->order->client->name }}</td>
                                <td class="text-center">{{ $medicine->order->subclient->name  }}</td>
                                <td class="text-center">{{ $medicine->patient->name }}, {{ $medicine->patient->lastname }}</td>
                                <td class="text-center">{{ $medicine->patient->origin }}</td>
                                <th class="text-center">{{ $medicine->user->name }}</th>
                                <td class="text-center">
                                    <a href="{{ route('form.medicina', $medicine) }}" class="btn btn-outline-secondary"><i class="fas fa-file-medical"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $medicines->links() }}
            </div>
        </div>
    </div>
</div>

