<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario de Cliente y Medicamentos</title>
<style>
  body { font-family: Arial, sans-serif; margin: 20px; }
  .section { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; }
  .section h2 { margin-top: 0; }
  .medicamento, .padecimiento { margin-bottom: 10px; }
</style>
</head>
<body>

<h1>Formulario de Cliente y Medicamentos</h1>

<div class="section">
  <h2>Datos del Cliente</h2>
  <label>Nombre: <input type="text" id="nombre"></label><br><br>
  <label>Apellido: <input type="text" id="apellido"></label><br><br>
  <label>Edad: <input type="number" id="edad"></label><br><br>
  <label>Foto: <input type="file" id="foto" accept="image/*"></label><br><br>

  <h3>Padecimientos</h3>
  <div id="padecimientosContainer"></div>
  <button type="button" onclick="agregarPadecimiento()">Agregar Padecimiento</button>
</div>

<div class="section">
  <h2>Medicamentos</h2>
  <div id="medicamentosContainer"></div>
  <button type="button" onclick="agregarMedicamento()">Agregar Medicamento</button>
</div>

<h2>Total a Pagar: $<span id="total">0</span></h2>

<script>
let total = 0;

// Función para agregar padecimiento
function agregarPadecimiento() {
  const container = document.getElementById('padecimientosContainer');
  const div = document.createElement('div');
  div.classList.add('padecimiento');
  div.innerHTML = `
    <input type="text" placeholder="Nombre del padecimiento">
    <button type="button" onclick="this.parentNode.remove()">Eliminar</button>
  `;
  container.appendChild(div);
}

// Función para agregar medicamento
function agregarMedicamento() {
  const container = document.getElementById('medicamentosContainer');
  const div = document.createElement('div');
  div.classList.add('medicamento');
  div.innerHTML = `
    <label>Categoría: <input type="text" placeholder="Categoría"></label>
    <label>Nombre: <input type="text" placeholder="Nombre del medicamento"></label>
    <label>Costo: <input type="number" placeholder="Costo" value="0" onchange="actualizarTotal()"></label>
    <label>Cantidad: <input type="number" placeholder="Cantidad" value="1" onchange="actualizarTotal()"></label>
    <button type="button" onclick="this.parentNode.remove(); actualizarTotal()">Eliminar</button>
  `;
  container.appendChild(div);
}

// Función para actualizar el total
function actualizarTotal() {
  const medicamentos = document.querySelectorAll('.medicamento');
  total = 0;
  medicamentos.forEach(med => {
    const costo = parseFloat(med.querySelector('input[placeholder="Costo"]').value) || 0;
    const cantidad = parseInt(med.querySelector('input[placeholder="Cantidad"]').value) || 0;
    total += costo * cantidad;
  });
  document.getElementById('total').innerText = total.toFixed(2);
}

// Cada vez que se cambia un costo o cantidad, se recalcula
document.getElementById('medicamentosContainer').addEventListener('input', actualizarTotal);
</script>

</body>
</html>
