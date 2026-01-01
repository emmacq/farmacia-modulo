<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario de prueba</title>
</head>
<body>

<h2>Formulario de prueba</h2>

<form action="guardar" method="post">
    <label>Nombre: <input type="text" name="nombre" required></label><br><br>
    <label>Apellido: <input type="text" name="apellido" required></label><br><br>
    <label>Edad: <input type="number" name="edad" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Teléfono: <input type="text" name="telefono" required></label><br><br>
    <input type="submit" value="Guardar">
</form>

</body>
</html>
