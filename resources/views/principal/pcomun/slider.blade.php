<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url({{ asset('principal/img/bg-img/hero1.jpg') }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h2 data-animation="fadeInUp" data-delay="100ms">RED DE CLINICAS</h2>
                            <h2 data-animation="fadeInUp" data-delay="400ms">H&S OCCUPATIONAL</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        @foreach($places as $place)
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url({{ $place->image }});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h3 data-animation="fadeInUp" data-delay="100ms">Correo: {{ $place->name }}</h3>
                                <h4 data-animation="fadeInUp" data-delay="400ms">{{ $place->email }} <br> Celular: {{ $place->phone }}
                                    <br> Dirección: {{ $place->address }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
