<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$client_ip = $_SERVER['REMOTE_ADDR'];
if ($client_ip === "::1") {
    $client_ip = "127.0.0.1"; 
}

$sql = "SELECT * FROM ippenas WHERE IP = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $client_ip);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Página acceso permitido
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceso Permitido</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url('fondo_bcn.jpg');
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                text-align: center;
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            h1 {
                color: #0d47a1;
            }
            p.ip {
                color: #2e7d32;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Bienvenido</h1>
            <p>Tu IP está autorizada.</p>
            <p class="ip">IP: $client_ip</p>
        </div>
    </body>
    </html>
    HTML;
} else {

    $sql_check = "SELECT * FROM conteo_errores WHERE ip = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $client_ip);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {

        $sql_update = "UPDATE conteo_errores SET intentos = intentos + 1 WHERE ip = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("s", $client_ip);
        $stmt_update->execute();
    } else {
        
        $sql_insert = "INSERT INTO conteo_errores (ip, intentos) VALUES (?, 1)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("s", $client_ip);
        $stmt_insert->execute();
    }

    $sql_get = "SELECT intentos FROM conteo_errores WHERE ip = ?";
    $stmt_get = $conn->prepare($sql_get);
    $stmt_get->bind_param("s", $client_ip);
    $stmt_get->execute();
    $result_get = $stmt_get->get_result();
    $row = $result_get->fetch_assoc();
    $intentos = $row['intentos'];

    // Página acceso denegado
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceso Denegado</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url('fondo_bcn.jpg');
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                text-align: center;
                background: rgba(255, 255, 255, 0.9);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            h1 {
                color: #b71c1c;
            }
            p {
                font-size: 16px;
            }
            .attempts {
                font-weight: bold;
                color: #d32f2f;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Página privada</h1>
            <p>No podemos atenderle.</p>
            <p class="attempts">Peticiones no atendidas: $intentos</p>
        </div>
    </body>
    </html>
    HTML;
}

$stmt->close();
$conn->close();
?>
