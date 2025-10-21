<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_colegioo");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los registros
$sql = "SELECT * FROM personas";
$resultado = $conexion->query($sql);

// Mostrar los datos en una tabla HTML
echo "<h2>Listado de Personas</h2>";

if ($resultado->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
<th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Ciudad</th>
            <th>Promedio</th>
            <th>Creado En</th>
          </tr>";
  while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["apellido"] . "</td>";
        echo "<td>" . $fila["correo"] . "</td>";
        echo "<td>" . $fila["telefono"] . "</td>";
        echo "<td>" . $fila["fecha_nacimiento"] . "</td>";
        echo "<td>" . $fila["ciudad"] . "</td>";
        echo "<td>" . $fila["promedio"] . "</td>";
        echo "<td>" . $fila["creado_en"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros en la tabla.";
}

// Cerrar conexión
$conexion->close();
?>