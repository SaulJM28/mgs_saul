<?php
$enlace = mysqli_connect("192.168.100.33", "sa", "@hY4^UBctYWTgm7E", "mgs");
//$enlace = mysqli_connect("localhost", "root", "", "int_canc_doc");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;


?>