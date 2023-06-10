<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LabFinal";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si se estableció correctamente la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se envió una solicitud de consulta de usuarios
if (isset($_GET["consulta"]) && $_GET["consulta"] == "true") {
    $query = "SELECT * FROM user";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Usuarios registrados:</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th><th>Login</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido1"] . "</td>";
            echo "<td>" . $row["apellido2"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["login"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros en la tabla usuarios.";
    }

    exit(); // Detener la ejecución del resto del archivo
}

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Validar los datos del formulario antes de insertar en la base de datos
    if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($login) || empty($password)) {
        echo "Por favor, complete todos los campos del formulario.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingrese un correo electrónico válido.";
        exit();
    }

    if (strlen($password) < 4 || strlen($password) > 8) {
        echo "La contraseña debe tener entre 4 y 8 caracteres.";
        exit();
    }

    // Verificar si el correo electrónico ya existe en la base de datos
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
        exit();
    }

    // Insertar los datos del formulario en la base de datos
    $query = "INSERT INTO user (nombre, apellido1, apellido2, email, login, password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "Registro completado con éxito.";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}

$conn->close();
?>
