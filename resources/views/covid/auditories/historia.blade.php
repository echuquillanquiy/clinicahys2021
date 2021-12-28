<style>
    @page{
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 20px;
        margin-right: 20px;
    }
</style>

<div style="margin-bottom: 50px">
    <table style="width: 100%">
        <tr>
            <th>
                <img src="{{ asset('img/logo-caraveli.jpg') }}" style="width: 25%; text-align: left">
            </th>

            <th>
                <img src="{{ asset('img/logo_hs_occupational.png') }}" style="width: 25%; text-align: right">
            </th>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <th style="background-color: #acb0c3; text-align: center; font-size: 1.5rem">EVALUACION DE SALUD FÍSICA</th>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem">
        <tr>
            <th style="text-align: left;">FECHA: {{ $order->created_at->format('d-m-Y') }}</th>
            <th style="text-align: right;">HORA DE ATENCIÓN: {{ $order->created_at->format('H:i:s') }}</th>
        </tr>
    </table>

    <table style="width: 100%; background-color: #acb0c3; padding-top: 0.6rem;">
        <tr>
            <th style="text-align: left;font-size: 0.9rem;">1.- FILIACIÓN:</th>
            <th></th>
        </tr>
        <tr>
            <td style="text-align: left;font-size: 0.74rem;"><strong>APELLIDOS Y NOMBRES:</strong> {{ $order->patient->name }} {{ $order->patient->lastname }}</td>
            <td style="text-align: right;font-size: 0.74rem;"><strong>LUGAR DE EVALUACIÓN:</strong> H&S OCCUPATIONAL</td>
        </tr>
    </table>


    <table style="width: 100%; font-size: 0.8rem; background-color: #acb0c3; padding-top: 0.1rem; margin-top: 5px">
        <tr>
            <td><strong>FECHA:</strong> {{ $order->created_at->format('d-m-Y') }}</td>
            <td><strong>HORA:</strong> {{ $order->created_at->format('H:i:s') }}</td>
            <td><strong>DNI:</strong> {{ $order->patient->dni }}</td>
            <td><strong>EDAD:</strong> {{ $order->patient->age }} años</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; padding-top: 0.1rem; margin-top: 5px">
        <tr>
            <td style="text-align: left"><strong>EMPRESA:</strong> {{ $order->client->name }}</td>
            <td style="text-align: center"><strong>OCUPACION:</strong> {{ $order->position->name }}</td>
            <td style="text-align: right"><strong>LUGAR PROCEDENCIA:</strong> {{ $order->patient->origin }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 5px">
        <tr style="align-items: center">
            <td><strong>2.- ANTECEDES PERSONALES / FAMILIARES</strong></td>
            <td style="text-align: right"><strong>SIN IMPORTANCIA</strong></td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.7rem; padding-top: 0.5rem; padding-bottom: 0.3rem">
        <tr>
            <td>{{ $order->medicine->ant_personal }}</td>
        </tr>
        <tr>
            <td>{{ $order->medicine->ant_family }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 3px">
        <tr>
            <td><strong>3.- ANAMNESIS</strong></td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.7rem; padding-top: 0.5rem; padding-bottom: 0.4rem">
        <tr>
            <td>{{ $order->medicine->anam_description }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 3px">
        <tr>
            <td><strong>4.- EVALUACIÓN FÍSICA: DIRIGIDA A SISTEMA RESPIRATORIO</strong></td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem; padding-top: 0.4rem">
        <tr style="text-align: center;">
            <td><strong>T°:</strong> {{ $order->medicine->temperature }}</td>
            <td><strong>FC:</strong> {{ $order->medicine->fc }}</td>
            <td><strong>SpO2:</strong> {{ $order->medicine->spo2 }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem;">
        <tr>
            <td style="padding-bottom: 0.4rem"><strong>Orofarínge:</strong> {{ $order->medicine->orofaringe }}</td>
        </tr>
        <tr>
            <td style="padding-bottom: 0.4rem"><strong>Cardiovascular:</strong> {{ $order->medicine->cardiovascular }}</td>
        </tr>

        <tr>
            <td style="padding-bottom: 0.4rem"><strong>Tórax:</strong> {{ $order->medicine->torax }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 3px">
        <tr>
            <td><strong>5.- PRUEBA DE LABORATORIO (Prueba Antígeno) previa firma de consentimiento informado:</strong></td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem;padding-top: 0.4rem; padding-bottom: 0.2rem">
        <tr style="text-align: center">
            <td>POSITIVO @if($order->laboratory->result == 'POSITIVO') (X) @endif</td>
            <td>NEGATIVO @if($order->laboratory->result == 'NEGATIVO') (X) @endif</td>
            <td>NO APLICA @if($order->laboratory->result == 'NO APLICA') (X) @endif</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 3px">
        <tr>
            <td><strong>6.- EVALUACIÓN DE ESTADO DE SALUD PRE ARRIBO A MINA</strong></td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem; padding-bottom: 0.2rem">
        <tr>
            <td style=""><strong>APTO PARA ABORDAR VEHÍCULO DE TRANSPORTE</strong></td>
        </tr>

        <tr style="text-align: center">
            <td style="padding-top: 0.6rem">SI @if($order->medicine->result == 'SI') (X) @endif</td>
            <td>NO @if($order->medicine->result == 'NO') (X) @endif</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.9rem; border: #0c0b0e 2px solid; align-content: center">
        <tr>
            <th style="text-align: center"><img src="{{ asset('storage/patients_huella_firma/' . $order->patient->image) }}" style="width: 30%"></th>
            <th style="text-align: center"><img src="{{ $order->medicine->user->profile_photo_url }}" style="width: 30%"></th>
        </tr>
        <tr>
            <th>FIRMA Y HUELLA DEL PACIENTE</th>
            <th>FIRMA DEL MEDICO</th>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem; padding-top: 1rem">
        <tr>
            <td><strong>Impresión Diagnóstica:</strong> {{ $order->medicine->printdx }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 0.8rem; padding-top: 0.5rem">
        <tr>
            <td><strong>Indicaciones Médicas / Observaciones:</strong> {{ $order->medicine->observations }}</td>
        </tr>
    </table>

</div>

    <div style="margin-top: 50px">
        <table style="width: 100%">
            <tr>
                <th>
                    <img src="{{ asset('img/logo-caraveli.jpg') }}" style="width: 30%; text-align: left">
                </th>

                <th>
                    <img src="{{ asset('img/logo_hs_occupational.png') }}" style="width: 30%; text-align: right">
                </th>
            </tr>
        </table>

        <table style="width: 100%; margin-left: -50px; margin-right: -50px">
            <tr>
                <th style="text-align: right">
                    N° - {{ $order->patient->dni }} - 2021
                </th>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <th>CONSTANCIA DE SALUD</th>
                <th></th>
            </tr>
        </table>

        <table style="width: 100%; margin-left: 15px; margin-right: -50px">
            <tr>
                <td>Por la presente se deja constancia que el Sr(a):</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Nombres y Apellidos:</td>
                <td style="border-bottom: #000000 dotted 1px;"><strong>{{ $order->patient->name }}, {{ $order->patient->lastname }}</strong></td>
                <td></td>
            </tr>

            <tr>
                <td>Identificado(a) con DNI N°:</td>
                <td style="border-bottom: #000000 dotted 1px;"><strong>{{ $order->patient->dni }}</strong></td>
                <td></td>
            </tr>

            <tr>
                <td>Trabajador de la empresa: </td>
                <td style="border-bottom: #000000 dotted 1px;"><strong>{{ $order->client->name }}</strong></td>
                <td></td>
            </tr>
        </table>

        <table style="width: 100%; margin-left: 5px; margin-right: -10px; margin-top: 0px">
            <tr>
                <td>
                    <p style="text-justify: distribute">Fue evaluado de acuerdo al protocolo de procedimiento serológicos del programa preventivo de pruebas de detección de ANTIGENO DE SARS-COV-2, encontrándose los siguientes resultados:</p>
                </td>
            </tr>

            <tr>
                <td>
                    <ul style="list-style: none; text-justify: distribute !important;">
                        <li style="margin-bottom: 10px">a) Temperatura corporal dentro de los parámetros normales permitidos (Tempratura inferior a 38 grados centígrados).</li>
                        <li style="margin-bottom: 10px">b) Saturación de Oxígeno mayor a 90%</li>
                        <li style="margin-bottom: 10px">c) Aparato respiratorio dentro de los parámetros normales, no encontrándose ningún síntoma o signo relacionado a la pandemia.</li>
                        <li style="margin-bottom: 10px">d) La ficha epidemiológica y declaración Jurada del paciente no indica contagio, enfermedades secundarias, disminución de sistema inmunológico o contacto con personas confirmadas o sospechosas de COVID - 19.</li>
                        <li>e) El resultados de PRUEBA DE DETECCION DE ANTIGENO DE SARS-COV-2 fue:</li>
                    </ul>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: #000000 solid 3px; padding: 1rem">
            <tr>
                @if($order->laboratory->result == 'POSITIVO')
                    <th>REACTIVO / POSITIVO ( X )</th>
                @elseif($order->laboratory->result == 'NEGATIVO')
                    <th>NO REACTIVO / NEGATIVO ( X )</th>
                @else
                    <th>NO APLICA ( X )</th>
                @endif

            </tr>
        </table>

        <table style="width: 100%; margin-top: 25px">
            <tr>
                <td>Según Prueba antigénica de Marca <strong>{{ $order->test->brand }}</strong> de Lote <strong>{{ $order->test->lot }}</strong></td>
            </tr>

            <tr>
                <td>Fecha de ejecución de la prueba Antígena {{ $order->created_at->format('d') }} de {{ $order->created_at->monthName }} del {{ $order->created_at->format('Y') }}.</td>
            </tr>

            <tr>
                <td>Se otorga la presente constancia a solicitud del evaluado apra los fines que estime conveniente.</td>
            </tr>

        </table>

        <table style="width: 100%; margin-top: 15px">

        <tr>
            <th style="text-align: center"><img src="{{ $order->medicine->user->profile_photo_url }}" style="width: 30%"></th>
        </tr>

        <tr>
            <td style="text-align: center; border-top: #000000 dashed 1px;">Firma del Médico Evaluador</td>
        </tr>

    </table>
</div>

