<?php
// Conectar a la base de datos
$host = 'localhost';
$dbname = 'registro';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Consultar los registros de alumnos
$sql = "SELECT CONCAT(nombre, ' ', apellidos) AS nombre_completo, fecha_registro, hora_registro FROM alumnos ORDER BY fecha_registro DESC, hora_registro DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Table Container */
.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 800px;
    margin-top: 20px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
    font-size: 16px;
}

thead {
    background-color: #007BFF;
    color: white;
}

thead th {
    padding: 12px 15px;
    text-align: left;
}

tbody tr {
    border-bottom: 1px solid #ddd;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

tbody td {
    padding: 12px 15px;
    color: #333;
}

/* Responsive */
@media (max-width: 600px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    thead {
        display: none;
    }

    tbody tr {
        margin-bottom: 10px;
        display: block;
        border-bottom: none;
    }

    tbody td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    tbody td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-weight: bold;
        text-align: left;
    }
}

</style>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Alumnos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="table-container">
        <h2>Registros de Alumnos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Fecha de Registro</th>
                    <th>Hora de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($registro['nombre_completo']); ?></td>
                    <td><?php echo htmlspecialchars($registro['fecha_registro']); ?></td>
                    <td><?php echo htmlspecialchars($registro['hora_registro']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
