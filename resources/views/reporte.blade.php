@extends('main')

@section('contenido')
<select id="categoria"></select>

<select id="medicamentoSelect"></select>
<button id="addMedicamento">Agregar medicamento</button>

<select id="servicioSelect"></select>
<button id="addServicio">Agregar servicio</button>

<table id="detalle">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th></th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<h3>Total: $<span id="total">0.00</span></h3>
@endsection