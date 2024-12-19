<?php
//este script es para insertar "CREAR" (primer paso del CRUD) el formulario en la base de datos
// Verifica si el formulario ha sido enviado
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Configura la conexión a la base de datos (debes reemplazar estos valores con los tuyos)
//     $servername = "tu_servidor";
//     $username = "root";
//     $password = "usuario";
//     $dbname = "proyectoFindeCurso";

// //     DB_CONNECTION=mysql
// // DB_HOST=127.0.0.1
// // DB_PORT=3306
// // DB_DATABASE=proyectoFindeCurso
// // DB_USERNAME=root
// // DB_PASSWORD=usuario

//     // Crea una conexión
//     $conn = new sql($servername, $username, $password, $dbname);

//     // Verifica la conexión
//     if ($conn->connect_error) {
//         die("Conexión fallida: " . $conn->connect_error);
//     }

//     // Obtiene los datos del formulario
//     $nombre = $_POST['nombre'];
//     $apellidos = $_POST['apellidos'];
//     $email = $_POST['email'];
//     $provincia = $_POST['provincias'];
//     $centro = $_POST['centro'];
//     $fecha_terminacion = $_POST['fecha_terminacion'];

//     // Prepara la consulta SQL para insertar datos en la base de datos
//     $sql = "INSERT INTO inscripciones (nombre, apellidos, email, provincia, centro, fecha_terminacion)
//     VALUES ('$nombre', '$apellidos', '$email', '$provincia', '$centro', '$fecha_terminacion')";

//     // Ejecuta la consulta SQL
//     if ($conn->query($sql) === TRUE) {
//         echo "¡Inscripción realizada con éxito!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }

//     // Cierra la conexión
//     $conn->close();
// }
// ?>
<!--1 Crear la base de datos: Asegúrate de tener una base de datos creada con una tabla para almacenar los datos de inscripción.
    2 Configurar la conexión a la base de datos: Define los parámetros de conexión a la base de datos en tu script PHP.
    3 Crear scripts PHP para cada operación CRUD: Debes tener scripts PHP separados para crear, leer, actualizar y borrar datos en la base de datos.
    4 Conectar el formulario HTML al script PHP: Configura el atributo action del formulario HTML para que apunte a los scripts PHP correspondientes. -->