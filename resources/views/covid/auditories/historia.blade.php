<img src="{{ asset('img/home/logo_portada.png') }}" style="width: 10%">
<table style="width: 100%">
    <tr>
        <th style="background-color: #acb0c3; text-align: center">EVALUACION DE SALUD FÍSICA</th>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem">
    <tr>
        <th style="text-align: left;">FECHA: {{ $order->created_at->format('Y/m/d') }}</th>
        <th style="text-align: right;">HORA DE ATENCIÓN: {{ $order->created_at->format('H:i') }}</th>
    </tr>
</table>

<table style="width: 100%; font-size: 0.67rem; background-color: #acb0c3; padding-top: 0.6rem; padding-bottom: 0.6rem">
    <tr>
        <th style="text-align: left;">1.- FILIACIÓN:</th>
        <th></th>
    </tr>
    <tr>
        <td style="text-align: left;"><strong>APELLIDOS Y NOMBRES:</strong> {{ $order->patient->name }} {{ $order->patient->lastname }}</td>
        <td style="text-align: right;">LUGAR DE EVALUACIÓN: H&S OCCUPATIONAL SAC</td>
    </tr>
</table>


<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; padding-bottom: 0.60rem; margin-top: 3px">
    <tr>
        <td><strong>FECHA:</strong> {{ $order->created_at->format('Y/m/d') }}</td>
        <td><strong>HORA:</strong> {{ $order->created_at->format('H:i') }}</td>
        <td><strong>DNI:</strong> {{ $order->patient->dni }}</td>
        <td><strong>EDAD:</strong>{{ $order->patient->age }} años</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; margin-top: 3px">
    <tr>
        <td><strong>2.- ANTECEDES PERSONALES / FAMILIARES</strong></td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem;">
    <tr>
        <td>{{ $order->medicine->ant_personal }}</td>
    </tr>
    <tr>
        <td>{{ $order->medicine->ant_family }}</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; margin-top: 3px">
    <tr>
        <td><strong>3.- ANAMNESIS</strong></td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem;">
    <tr>
        <td>{{ $order->medicine->anam_description }}</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; margin-top: 3px">
    <tr>
        <td><strong>4.- EVALUACIÓN FÍSICA: DIRIGIDA A SISTEMA RESPIRATORIO</strong></td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem;">
    <tr style="text-align: center">
        <td>T°: {{ $order->medicine->temperature }}</td>
        <td>FC: {{ $order->medicine->fc }}</td>
        <td>SpO2: {{ $order->medicine->spo2 }}</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem;">
    <tr>
        <td><strong>Orofarínge:</strong> {{ $order->medicine->orofaringe }}</td>
    </tr>
    <tr>
        <td><strong>Cardiovascular:</strong> {{ $order->medicine->cardiovascular }}</td>
    </tr>

    <tr>
        <td><strong>Tórax:</strong> {{ $order->medicine->torax }}</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; margin-top: 3px">
    <tr>
        <td><strong>5.- PRUEBA DE LABORATORIO (Prueba Antígeno) previa firma de consentimiento informado:</strong></td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem;">
    <tr style="text-align: center">
        <td>POSITIVO @if($order->laboratory->result == 'POSITIVO') (X) @endif</td>
        <td>NEGATIVO @if($order->laboratory->result == 'NEGATIVO') (X) @endif</td>
        <td>NO APLICA @if($order->laboratory->result == 'NO APLICA') (X) @endif</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem; background-color: #acb0c3; margin-top: 3px">
    <tr>
        <td><strong>6.- EVALUACIÓN DE ESTADO DE SALUD PRE ARRIBO A MINA</strong></td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.8rem;">
    <tr style="text-align: center">
        <td>SI @if($order->medicine->result == 'SI') (X) @endif</td>
        <td>NO @if($order->medicine->result == 'NO') (X) @endif</td>
    </tr>
</table>

<table style="width: 100%; font-size: 0.7rem;">
    <tr>
        <th>IMPRESIÓN DIAGNÓSTICA</th>
        <th>INDICACIONES MÉDICAS / OBSERVACIONES</th>
    </tr>

    <tr>
        <td>{{ $order->medicine->printdx }}</td>
        <td>{{ $order->medicine->observations }}</td>
    </tr>
</table>

