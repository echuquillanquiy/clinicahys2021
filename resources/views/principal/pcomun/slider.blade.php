<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url({{ asset('principal/img/bg-img/hero1.jpg') }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">"Trabajo con Salud"</h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Red de clínicas H&S OCCUPATIONAL</h6>
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
                                <h2 data-animation="fadeInUp" data-delay="100ms">{{ $place->name }}</h2>
                                <h3 data-animation="fadeInUp" data-delay="400ms">{{ $place->email }} <br> {{ $place->phone }}
                                    <br> {{ $place->address }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
