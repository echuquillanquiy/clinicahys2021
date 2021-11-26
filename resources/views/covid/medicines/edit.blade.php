@extends('layouts.theme')

@section('content')

    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('atenciones.medicina') }}">Regresar al Listado</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('atenciones.medicina') }}">Formulario medico: {{ $medicine->order->patient->name }}, {{ $medicine->order->patient->lastname }}</a></li>
            </ol>
        </nav>
    </div>


    @if (session('notification'))
        <div class="alert alert-success mt-1 mb-0" role="alert">
            <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
            {{ session('notification') }}
        </div>
    @endif


    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <form action="{{ route('form-act', $medicine) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-xl-6 mt-1">
                            <div class="bg-primary rounded-lg">
                                <p class="text-center text-white font-bold h5">ANTECEDENTES PERSONALES / FAMILIARES</p>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                        </div>
                                        <textarea type="text" name="ant_personal" class="form-control" rows="2" placeholder="ANTECEDENTE PERSONAL" autofocus></textarea>
                                    </div>
                                    @error('ant_personal')
                                        <span class="text-danger er">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-users"></i></div>
                                        </div>
                                        <textarea type="text" name="ant_family" class="form-control" rows="2" placeholder="ANTECEDENTE FAMILIAR"></textarea>
                                    </div>
                                    @error('ant_family')
                                    <span class="text-danger er">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 mt-1">
                            <div class="bg-primary rounded-lg">
                                <p class="text-center text-white font-bold h5">ANAMNESIS</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-file-archive"></i></div>
                                    </div>
                                    <textarea type="text" name="anam_description" class="form-control" rows="2"></textarea>
                                </div>
                                @error('anam_description')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-primary rounded-lg col-xl-12">
                            <p class="text-center text-white font-bold h5">EVALUACIÓN FÍSICA DIRIGIDA A SISTEMA RESPIRATORIO</p>
                        </div>

                        <div class="col-xl-4 mt-2">
                            <div class="form-group">
                                <label class="control-label">TEMPERATURA:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-temperature-high"></i></div>
                                    </div>
                                    <input type="text" name="temperature" class="form-control">
                                </div>
                                @error('temperature')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mt-2">
                            <div class="form-group">
                                <label class="control-label">FRECUENCIA CARDIACA:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-wave-square"></i></div>
                                    </div>
                                    <input type="text" name="fc" class="form-control">
                                </div>
                                @error('fc')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mt-2">
                            <div class="form-group">
                                <label class="control-label">SpO2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-stethoscope"></i></div>
                                    </div>
                                    <input type="text" name="fc" class="form-control">
                                </div>
                                @error('fc')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mt-1">
                            <div class="bg-primary rounded-lg">
                                <p class="text-center text-white font-bold h5">OROFARINGE</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-teeth-open"></i></div>
                                    </div>
                                    <textarea type="text" name="orofaringe" class="form-control" rows="2"></textarea>
                                </div>
                                @error('orofaringe')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mt-1">
                            <div class="bg-primary rounded-lg">
                                <p class="text-center text-white font-bold h5">CARDIOVASCULAR</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                    </div>
                                    <textarea type="text" name="cardiovascular" class="form-control" rows="2"></textarea>
                                </div>
                                @error('cardiovascular')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mt-1">
                            <div class="bg-primary rounded-lg">
                                <p class="text-center text-white font-bold h5">TÓRAX</p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lungs"></i></div>
                                    </div>
                                    <textarea type="text" name="torax" class="form-control" rows="2"></textarea>
                                </div>
                                @error('torax')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-primary rounded-lg col-xl-12">
                            <p class="text-center text-white font-bold h5">PRUEBA DE LABORATORIO (Prueba Antígeno) previa firma de consentimiento informado:</p>
                        </div>

                        <div class="col-xl-12 mt-2 text-center mb-2">
                            <input type="text" class="form-control" name="lab_result" value="{{ $medicine->order->laboratory->result }}" readonly>
                        </div>

                        <div class="bg-primary rounded-lg col-xl-12">
                            <p class="text-center text-white font-bold h5">EVALUACIÓN DE ESTADO DE SALUD PRE ARRIBO A MINA</p>
                        </div>

                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label>¿APTO PARA ABORDAR VEHÍCULO DE TRANSPORTE?</label>
                                    <select name="result" class="form-control text-center">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                @error('result')
                                <span class="text-danger er">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-xl-4 mt-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-file-archive"></i></div>
                                        </div>
                                        <textarea type="text" name="observations" class="form-control" rows="2" placeholder="IMPRESIÓN DIAGNOSTICA"></textarea>
                                    </div>
                                    @error('observations')
                                    <span class="text-danger er">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-4 mt-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-file-archive"></i></div>
                                        </div>
                                        <textarea type="text" name="indications" class="form-control" rows="2" placeholder="INDICACIONES MÉDICAS / OBSERVACIONES"></textarea>
                                    </div>
                                    @error('indications')
                                    <span class="text-danger er">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <button type="submit" class="btn btn-primary btn-block">GUARDAR</button>
                            </div>

                            <div class="col-xl-6">
                                <a href="{{ route('atenciones.medicina') }}" class="btn btn-danger btn-block">REGRESAR</a>
                            </div>
                        </div>



                </form>
            </div>
        </div>
    </div>

@endsection
