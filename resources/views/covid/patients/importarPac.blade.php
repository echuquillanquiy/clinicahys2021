@extends('layouts.theme')

@section('content')
    <div class="row layout-top-spacing p-5">

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <form action="{{ route('import.patient') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body custom-file">
                        <input type="file" name="file" class="custom-file-input" required>
                        <label class="custom-file-label">Seleccione su archivo paciente.xlsx</label>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Importar</button>
                        <a href="{{ url('collaborators') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
        </div>
    </div>


@endsection
