<!DOCTYPE html>
<html lang="es">

@include('principal.pcomun.styles')

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="medilife-load"></div>
</div>

<!-- ***** Header Area Start ***** -->
@include('principal.pcomun.header')
<!-- ***** Header Area End ***** -->

<!-- ***** Hero Area Start ***** -->
@include('principal.pcomun.slider')
<!-- ***** Hero Area End ***** -->

@yield('content')

<!-- ***** Footer Area Start ***** -->
@include('principal.pcomun.footer')
<!-- ***** Footer Area End ***** -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
@include('principal.pcomun.scripts')

</body>

</html>
