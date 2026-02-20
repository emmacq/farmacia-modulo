@extends('main')

@section('contenido')
<h2>Alta de pacientes</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('guardar') }}" method="POST" id="formPaciente">
    @csrf

    <label>Nombre paciente:
        <select id="id_c">
            <option value="">Seleccione un paciente</option>
            @foreach($clientes as $cli)
                <option value="{{ $id_c->id_c }}">
                    {{ $cli->nombre }}
                </option>
            @endforeach
        </select>
    </label><br><br>

    <label>Apellido:
        <input type="text" name="apellido" required>
    </label><br><br>

    <label>Edad:
        <input type="number" name="edad" required>
    </label><br><br>

    <label>Teléfono:
        <input type="text" name="telefono" required>
    </label><br><br>

    <label>Dirección:
        <input type="text" name="direccion" required>
    </label><br><br>

    <label>Email:
        <input type="text" name="email" required>
    </label><br><br>

    <label>Sexo:
        <select name="sexo" required>
            <option value="">Seleccione</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </label><br><br>

    <label>Empleado:
        <select name="id_empleado" required>
            <option value="">Seleccione un empleado</option>
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id_empleado }}">
                    {{ $empleado->nombre }} {{ $empleado->apellido }}
                </option>
            @endforeach
        </select>
    </label><br><br>

    <hr>

    <label>Categorías:
        <select id="id_cat">
            <option value="">Seleccione una categoria</option>
            @foreach($categorias_m as $cat)
                <option value="{{ $cat->id_cat }}">
                    {{ $cat->nombre }}
                </option>
            @endforeach
        </select>
    </label><br><br>

    <label>Medicamento:
        <select id="id_med" disabled>
            <option value="">Seleccione una categoria primero</option>
        </select>
    </label>

    <button type="button" id="btnAddMed">Agregar medicamento</button>

    <br><br>

    <label>Servicios:
        <select id="id_s">
            <option value="">Seleccione un servicio</option>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id_s }}" data-precio="{{ $servicio->precio }}">
                    {{ $servicio->nombre }}
                </option>
            @endforeach
        </select>
    </label>

    <button type="button" id="btnAddServ">Agregar servicio</button>

    <br><br>
    <hr>

    <h3>Detalle</h3>
    <table border="1" cellpadding="6" id="detalle">
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

    <input type="hidden" name="detalle_json" id="detalle_json">

    <button type="submit">Guardar</button>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const selectCat = document.getElementById("id_cat");
    const selectMed = document.getElementById("id_med");
    const btnAddMed = document.getElementById("btnAddMed");

    const selectServ = document.getElementById("id_s");
    const btnAddServ = document.getElementById("btnAddServ");

    const tbody = document.querySelector("#detalle tbody");
    const totalSpan = document.getElementById("total");
    const detalleJsonInput = document.getElementById("detalle_json");
    const form = document.getElementById("formPaciente");

    function money(n) { return (Number(n) || 0).toFixed(2); }

    function actualizarHidden() {
        const items = [];
        tbody.querySelectorAll("tr").forEach(tr => {
            items.push({
                tipo: tr.dataset.tipo,
                id: Number(tr.dataset.id),
                nombre: tr.dataset.nombre,
                precio: Number(tr.dataset.precio),
                cantidad: Number(tr.querySelector(".cantidad").value || 0),
                subtotal: Number(tr.querySelector(".subtotal").textContent || 0)
            });
        });
        detalleJsonInput.value = JSON.stringify(items);
    }

    function recalcularTotal() {
        let total = 0;
        tbody.querySelectorAll("tr").forEach(tr => {
            total += Number(tr.querySelector(".subtotal").textContent || 0);
        });
        totalSpan.textContent = money(total);
        actualizarHidden();
    }

    function recalcularFila(tr) {
        const precio = Number(tr.querySelector(".precio").dataset.valor || 0);
        const cantidad = Number(tr.querySelector(".cantidad").value || 0);
        tr.querySelector(".subtotal").textContent = money(precio * cantidad);
        recalcularTotal();
    }

    function agregarFila({tipo, id, nombre, precio}) {
        if (!id) return;

        const tr = document.createElement("tr");
        tr.dataset.tipo = tipo;
        tr.dataset.id = id;
        tr.dataset.nombre = nombre;
        tr.dataset.precio = precio;

        tr.innerHTML = `
            <td>${tipo}</td>
            <td>${nombre}</td>
            <td class="precio" data-valor="${precio}">$${money(precio)}</td>
            <td><input class="cantidad" type="number" min="1" value="1" style="width:70px"></td>
            <td class="subtotal">${money(precio)}</td>
            <td><button type="button" class="remove">X</button></td>
        `;

        tr.querySelector(".cantidad").addEventListener("input", () => recalcularFila(tr));
        tr.querySelector(".remove").addEventListener("click", () => { tr.remove(); recalcularTotal(); });

        tbody.appendChild(tr);
        recalcularTotal();
    }

    selectCat.addEventListener("change", async function () {
        const idCat = this.value;
        selectMed.innerHTML = '<option value="">Cargando...</option>';
        selectMed.disabled = true;

        if (!idCat) {
            selectMed.innerHTML = '<option value="">Seleccione una categoria primero</option>';
            return;
        }

        try {
            const url = `{{ url('medicamentos-por-categoria') }}/${idCat}`;
            const resp = await fetch(url);
            if (!resp.ok) throw new Error('Error HTTP: ' + resp.status);

            const data = await resp.json();
            let html = '<option value="">Seleccione un medicamento</option>';
            data.forEach(m => {
                html += `<option value="${m.id_m}" data-precio="${m.precio}">${m.nombre}</option>`;
            });

            selectMed.innerHTML = html;
            selectMed.disabled = false;

        } catch (e) {
            console.error(e);
            selectMed.innerHTML = '<option value="">Error al cargar</option>';
        }
    });

    btnAddMed.addEventListener("click", () => {
        const opt = selectMed.selectedOptions[0];
        if (!opt || !opt.value) return;
        agregarFila({ tipo: "Medicamento", id: opt.value, nombre: opt.textContent, precio: opt.dataset.precio });
    });

    btnAddServ.addEventListener("click", () => {
        const opt = selectServ.selectedOptions[0];
        if (!opt || !opt.value) return;
        agregarFila({ tipo: "Servicio", id: opt.value, nombre: opt.textContent, precio: opt.dataset.precio });
    });

    form.addEventListener("submit", () => actualizarHidden());
});
</script>
@endsection
