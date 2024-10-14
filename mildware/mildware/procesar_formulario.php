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

// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $matricula = $_POST['matricula'];
    $carrera = $_POST['carrera'];
    
    // Insertar los datos en la tabla
    $sql = "INSERT INTO alumnos (nombre, apellidos, matricula, carrera, fecha_registro, hora_registro)
            VALUES (:nombre, :apellidos, :matricula, :carrera, CURDATE(), CURTIME())";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':carrera', $carrera);
    
    if ($stmt->execute()) {
        // Redireccionar a index.php después del registro exitoso
        header('Location: index.php');
        exit();  // Asegurarse de detener el script después de redirigir
    } else {
        echo "Error al registrar el alumno";
    }
}
?>
