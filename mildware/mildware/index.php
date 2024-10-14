<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario Alumno</title>
    <link rel="stylesheet" href="styles.css" />
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

/* Form Container */
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Form Elements */
form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #555;
    font-size: 14px;
}

input[type="text"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
    outline: none;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus {
    border-color: #007BFF;
}

button {
  
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Align the second button (Ver Registros) */
button + button {
    margin-top: 10px;
    background-color: #6c757d;
}

button + button:hover {
    background-color: #5a6268;
}

    </style>
  </head>
  <body>
    <div class="form-container">
      <h2>Registro de Alumno</h2>
      <form action="procesar_formulario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required />

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required />

        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required />

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" required />

        <button type="submit">Enviar</button>
      </form>
<br>
      <!-- Botón para redirigir a middleware.php -->
      <button onclick="window.location.href='middleware.php';">
        Ver Registros
      </button>
    </div>
  </body>
</html>
