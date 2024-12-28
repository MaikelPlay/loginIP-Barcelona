<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #login-container {
            width: 400px;
            height: 500px;
            padding: 20px;
            background-image: url('barcelona-logo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            color: white;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 20px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"], .btn {
            background-color:maroon;
            color: white;
            padding: 10px 15px;
            margin: 200px 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover, .btn:hover {
            background-color:midnightblue;
        }
    </style>
</head>
<body>
    <div id="login-container">
        <h1>Página oficial privada del FC Barcelona</h1>
        <h1>Autentificación</h1>
        <form action="acceso.php" method="POST">
            <input type="text" name="nombre" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <input type="submit" value="Login">
                <button type="button" class="btn">Alta</button>
            </div>
        </form>
    </div>
</body>
</html>
