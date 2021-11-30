<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> CORK </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">
            @can('Resultado_index')
                <li class="menu single-menu active">
                    <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i class="fas fa-tachometer-alt text-primary"></i>
                            <span>Resultados</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                        <li class="active">
                            <a href="{{ route('auditoria') }}"> Resultados </a>
                        </li>
                    </ul>
                </li>
            @endcan

            <li class="menu single-menu">
                @can('Administracion')
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                        <div>
                            <i class="fas fa-toolbox text-primary"></i>
                            <span class="text-primary">Administración</span>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                @endcan
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    @can('Role_index')
                        <li>
                            <a href="{{ route('roles') }}"> Roles </a>
                        </li>
                    @endcan

                    @can('Permiso_index')
                    <li>
                        <a href="{{ route('permisos') }}"> Permisos </a>
                    </li>
                    @endcan

                    @can('Asignar_index')
                    <li>
                        <a href="{{ route('asignar.permisos') }}"> Asignar </a>
                    </li>
                    @endcan

                     @can('Usuario_index')
                    <li>
                        <a href="{{ route('usuarios') }}"> Usuarios </a>
                    </li>
                    @endcan
                    @can('Empresa_index')
                        <li>
                            <a href="{{ route('clientes') }}"> Empresas </a>
                        </li>
                    @endcan

                    @can('Prueba_index')
                    <li>
                        <a href="{{ route('pruebas') }}"> Pruebas </a>
                    </li>
                    @endcan

                    @can('Puesto_index')
                    <li>
                        <a href="{{ route('puestos') }}"> Puestos </a>
                    </li>
                    @endcan
                </ul>
            </li>

            <li class="menu single-menu">
                @can('Admision')
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        <i class="fas fa-people-arrows text-primary"></i>
                        <span class="text-primary">Admisión</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                @endcan
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    @can('Paciente_index')
                    <li>
                        <a href="{{ route('pacientes') }}"> Pacientes </a>
                    </li>
                    @endcan

                    @can('Orden_index')
                    <li>
                        <a href="{{ route('ordenes') }}"> Ordenes </a>
                    </li>
                    @endcan
                </ul>
            </li>

            <li class="menu single-menu">
                @can('Atenciones')
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        <i class="fas fa-briefcase-medical text-primary"></i>
                        <span class="text-primary">Atenciones</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                @endcan
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    @can('Medicina_index')
                    <li>
                        <a href="{{ route('atenciones.medicina') }}"> Medicina </a>
                    </li>
                    @endcan

                    @can('Laboratorio_index')
                    <li>
                        <a href="{{ route('atenciones.laboratorio') }}"> Laboratorio </a>
                    </li>
                    @endcan

                    @can('Auditoria_index')
                    <li>
                        <a href="{{ route('auditoria') }}"> Auditoria </a>
                    </li>
                    @endcan
                </ul>
            </li>
        </ul>
    </nav>
</div>
