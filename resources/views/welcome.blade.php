@extends('principal.app')

@section('content')

    <!-- ***** Book An Appoinment Area Start ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="medilife-appointment-form">
                                    @if(session('notification'))
                                        <div class="text-warning text-sm p-2" role="alert">
                                            <strong>Éxito!</strong> {{ session('notification') }}
                                        </div>
                                    @endif
                                    <h1 class="text-white">SOLICITE SU COTIZACIÓN</h1>
                                    <form action="{{ route('store.quotation') }}" method="post">
                                        @csrf
                                        <div class="row align-items-end">
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="ruc" id="ruc" placeholder="Ruc">
                                                </div>
                                                @error('ruc')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-5">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="name" id="name" placeholder="Razón Social">
                                                </div>
                                                @error('name')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-5">
                                                <div class="form-group">
                                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0" name="email" id="email" placeholder="E-mail">
                                                </div>
                                                @error('email')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control border-top-0 border-right-0 border-left-0" name="phone" id="phone" placeholder="Teléfono">
                                                </div>
                                                @error('phone')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="contact" id="contact" placeholder="Nombre de Contato">
                                                </div>
                                                @error('contact')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="position" id="position" placeholder="Cargo">
                                                </div>
                                                @error('position')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="workers" id="workers" placeholder="N° de trabajadores">
                                                </div>
                                                @error('workers')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-7">
                                                <div class="form-group mb-0">
                                                    <textarea name="positions" class="form-control mb-0 border-top-0 border-right-0 border-left-0" id="positions" cols="30" rows="10" placeholder="Puestos de trabajo"></textarea>
                                                </div>
                                                @error('positions')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-5 mb-0">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn medilife-btn">Solicita tu cotización <span>+</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="medilife-contact-info">
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="{{ asset('principal/img/icons/alarm-clock.png') }}" alt="">
                                        <p>Lunes - Sabado<br>Domingo Cerrado</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="{{ asset('principal/img/icons/envelope.png') }}" alt="">
                                        <p>991528444 <br>cotizaciones@hysoccupational.com</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info">
                                        <img src="{{ asset('principal/img/icons/map-pin.png') }}" alt="">
                                        <p>Atención en todas nuestras sedes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Book An Appoinment Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="medica-about-us-area section-padding-100-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="medica-about-content">
                        <h2>NUESTROS SERVICIOS</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                        <a href="#" class="btn medilife-btn mt-50">Nuestros Servicios <span>+</span></a>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <!-- Single Service Area -->
                        @foreach($services as $service)
                            <div class="col-12 col-sm-4">
                                <div class="single-service-area d-flex">
                                    <div class="service-icon">
                                        <i class="icon-hospital"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5>{{ $service->name }}</h5>
                                        <p>{{ Str::limit($service->description, 100) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Service Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Gallery Area Start ***** -->
    <div class="medilife-gallery-area owl-carousel">
        @foreach($services as $service)
            <div class="single-gallery-item">
                <img src="{{ $service->image }}" alt="{{ $service->name }}">
                <div class="view-more-btn">
                    <h2 class="text-white">{{ $service->name }}</h2>
                    <a href="{{ $service->image }}" class="btn gallery-img">Ver más +</a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- ***** Gallery Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <div class="container-fluid mt-50 mb-50">
        <div class="row ml-5">
            <!-- Single Blog Area -->
            @foreach($places as $place)

                <div class="col-2 mr-5">

                    <a href="{{ $place->url }}" target="_blank">
                        <img class="image-full" src="{{ $place->image }}" alt="{{ $place->name }}">
                    </a>

                    <h4 class="text-center">{{ $place->name }}</h4>
                </div>

            @endforeach
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->


@endsection
