<?php
$servername = "localhost"; 
$username = "root";  
$password = "AirtonKaz.21"; 
$database = "BdSneakers"; // Nombre exacto de tu BD

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} 

echo "Conexión exitosa a la base de datos BdSneakers";
?>
