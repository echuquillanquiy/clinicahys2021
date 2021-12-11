<div style="margin-top: 30px">
    <table style="width: 100%">
        <tr>
            <td>
                <img src="{{ asset('img/logo_hs_occupational.png') }}" style="width: 30%; text-align: left">
            </td>
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
            @else
                <th>NO REACTIVO / NEGATIVO ( X )</th>
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
