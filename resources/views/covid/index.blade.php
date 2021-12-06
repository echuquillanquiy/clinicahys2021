@extends('layouts.theme')

@section('content')
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Resultados</a></li>
            </ol>
        </nav>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text"><span>Ver</span> : Reportes Empresa</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="{{ route('export.patient') }}">Resultados del día</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Descargar historias</a>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row widget-statistic">
                <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ $patients }}</p>
                                    <h5 class="font-weight-bold">PACIENTES REGISTRADOS</h5>
                                </div>
                            </div>
                            @can('Auditoria_index')
                                <a href="{{ route('auditoria') }}" class="btn btn-primary btn-block btn-lg"><i class="fas fa-ambulance"></i> RESULTADOS</a>
                            @endcan
                        </div>
                        <div class="widget-content">
                            <div class="w-chart">
                                <div id="hybrid_followers"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-referral">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ $orders }}</p>
                                    <h5 class="">ORDENES REGISTRADAS</h5>
                                </div>
                            </div>
                            @can('Paciente_index')
                                <a href="#" class="btn btn-danger btn-block btn-lg"><i class="fas fa-user-edit"></i> ORDENES REGISTRADAS</a>
                            @endcan
                        </div>
                        <div class="widget-content">
                            <div class="w-chart">
                                <div id="hybrid_followers1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
