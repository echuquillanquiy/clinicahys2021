<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-4 grid xs:grid-cols-12 sm:grid-cols-12 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

        @can('ADMINISTRADOR')
            <div class="mockup-phone border-red-500">
                <div class="camera"></div>
                <div class="display" >
                    <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/adm.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                        <a href="{{ route('admininistrador') }}" class="btn btn-error btn-lg">ADMINISTRADOR</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('HEMODIALISIS')
            <div class="mockup-phone border-primary">
                <div class="camera"></div>
                <div class="display">
                    <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/dia.jpg') }}); background-repeat: no-repeat; background-size: 120%; opacity: 80%">
                        <a href="http://hedial.clinicahys.com/login" class="btn btn-primary btn-lg">HEMODIALISIS</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('COVID-19')
            <div class="mockup-phone border-accent">
                <div class="camera"></div>
                <div class="display">
                    <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/lab.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                        <a href="{{ route('covid.index') }}" class="btn btn-accent btn-lg">COVID - 19</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('ENTREVISTADORES')
            <div class="mockup-phone border border-neutral">
                <div class="camera"></div>
                <div class="display">
                    <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/ent.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                        <a href="#" class="btn btn-lg">Entrevistadores</a>
                    </div>
                </div>
            </div>
        @endcan

    </div>
</x-app-layout>
