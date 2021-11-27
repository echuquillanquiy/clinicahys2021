<table style="width: 100%">
    <tr>
        <th>
            <img src="{{ asset('img/logo-caraveli.jpg') }}" style="width: 20%">
        </th>

        <th>
            <img src="{{ asset('img/home/logo_portada.png') }}" style="width: 10%">
        </th>
    </tr>
</table>
<table style="width: 100%">
    <tr>
        <th style="background-color: #acb0c3; text-align: center">EVALUACION DE SALUD FÍSICA</th>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem">
    <tr>
        <th style="text-align: left;">FECHA: {{ $order->created_at->format('Y/m/d') }}</th>
        <th style="text-align: right;">HORA DE ATENCIÓN: {{ $order->created_at->format('H:i') }}</th>
    </tr>
</table>

<table style="width: 100%; background-color: #acb0c3; padding-top: 0.6rem; padding-bottom: 0.6rem">
    <tr>
        <th style="text-align: left;font-size: 0.9rem;">1.- FILIACIÓN:</th>
        <th></th>
    </tr>
    <tr>
        <td style="text-align: left;font-size: 0.7rem;"><strong>APELLIDOS Y NOMBRES:</strong> {{ $order->patient->name }} {{ $order->patient->lastname }}</td>
        <td style="text-align: right;font-size: 0.7rem;"><strong>LUGAR DE EVALUACIÓN:</strong> H&S OCCUPATIONAL</td>
    </tr>
</table>


<table style="width: 100%; font-size: 0.8rem; background-color: #acb0c3; padding-top: 0.1rem; margin-top: 5px">
    <tr>
        <td><strong>FECHA:</strong> {{ $order->created_at->format('Y/m/d') }}</td>
        <td><strong>HORA:</strong> {{ $order->created_at->format('H:i') }}</td>
        <td><strong>DNI:</strong> {{ $order->patient->dni }}</td>
        <td><strong>EDAD:</strong>{{ $order->patient->age }} años</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.9rem; background-color: #acb0c3; margin-top: 5px">
    <tr>
        <td><strong>2.- ANTECEDES PERSONALES / FAMILIARES</strong></td>
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
        <td>T°: {{ $order->medicine->temperature }}</td>
        <td>FC: {{ $order->medicine->fc }}</td>
        <td>SpO2: {{ $order->medicine->spo2 }}</td>
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

<table style="width: 100%; font-size: 0.8rem;padding-top: 0.6rem; padding-bottom: 0.4rem">
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

<table style="width: 100%; font-size: 0.8rem;">
    <tr style="text-align: center">
        <td style="padding-top: 0.6rem">SI @if($order->medicine->result == 'SI') (X) @endif</td>
        <td>NO @if($order->medicine->result == 'NO') (X) @endif</td>
    </tr>
</table>

<table style="width: 100%; padding-top: 8rem;font-size: 0.9rem; border: #0c0b0e 2px solid">
    <tr>
        <th>FIRMA Y HUELLA DEL PACIENTE</th>
        <th>FIRMA DEL MEDICO</th>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem; padding-top: 2rem">
    <tr>
        <td><strong>Orofarínge:</strong> {{ $order->medicine->printdx }}</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem; padding-top: 0.5rem">
    <tr>
        <td><strong>Cardiovascular:</strong> {{ $order->medicine->observations }}</td>
    </tr>
</table>


<table style="width: 100%; padding-top: 5rem">
<tr>
    <td style="text-align: center; font-size: 0.6rem">Creado por: Eduardo Chuquillanqui - 2021 - echuquillanquiy@gmail.com - 933247583</td>
</tr>
</table>
