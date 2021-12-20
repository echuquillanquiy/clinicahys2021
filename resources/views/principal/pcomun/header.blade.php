<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <p>Bienvenido a <span>RED DE CLINICAS H&S OCCUPATIONAL</span></p>
                        <p>Atención Servicio Ocupacional: <span>991528444</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse" id="medilifeMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuestras Sedes</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($places as $place)
                                                <a class="dropdown-item" href="index.html">{{ $place->name }}</a>
                                            @endforeach

                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Contacto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="">Acceso Clientes</a>
                                    </li>
                                </ul>
                                <!-- Appointment Button -->
                                <a href="{{ route('login') }}" class="btn medilife-appoint-btn mr-2">Ingresar</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
