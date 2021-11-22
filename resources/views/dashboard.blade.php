<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-36 grid xs:grid-cols-12 sm:grid-cols-12 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">

        <div class="mockup-phone border-red-500">
            <div class="camera"></div>
            <div class="display" >
                <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/adm.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                    <a href="{{ route('admininistrador') }}" class="btn btn-error btn-lg" target="_blank">ADMINISTRADOR</a>
                </div>
            </div>
        </div>

        <div class="mockup-phone border-primary">
            <div class="camera"></div>
            <div class="display">
                <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/dia.jpg') }}); background-repeat: no-repeat; background-size: 120%; opacity: 80%">
                    <a href="http://hedial.clinicahys.com/login" class="btn btn-primary btn-lg" target="_blank">HEMODIALISIS</a>
                </div>
            </div>
            </div>

        <div class="mockup-phone border-accent">
            <div class="camera"></div>
            <div class="display">
                <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/lab.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                    <a href="{{ route('covid.index') }}" class="btn btn-accent btn-lg" target="_blank">COVID - 19</a>
                </div>
            </div>
        </div>

        <div class="mockup-phone border border-neutral">
            <div class="camera"></div>
            <div class="display">
                <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/ent.jpg') }}); background-repeat: no-repeat; background-size: 120%">
                    <a href="#" class="btn btn-lg" target="_blank">Entrevistadores</a>
                </div>
            </div>
        </div>

        <div class="mockup-phone border-secondary sm:mt-2">
            <div class="camera"></div>
            <div class="display">
                <div class="artboard phone-1 artboard-demo" style="background-image: url({{ asset('img/dashboard/busi.jpg') }}); background-repeat: no-repeat; background-size: 120%; opacity: 80%">
                    <a href="#" class="btn btn-secondary btn-lg" target="_blank">Empresas</a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
