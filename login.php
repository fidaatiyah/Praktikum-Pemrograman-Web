<?php
require 'function.php';
$error = false;

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $user["password"])) {
            header("Location: datamahasiswa.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | INFORMATIKA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --primary-hover: #00509e;
            --background-gradient: linear-gradient(to bottom, #d9e9ff, #f0f8ff);
            --input-border: #b0c4de;
            --error-color: #ff3333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-gradient);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            width: 320px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
        }

        form {
            text-align: left;
        }

        label {
            font-weight: 600;
            color: var(--primary-color);
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid var(--input-border);
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 83, 153, 0.2);
        }

        .remember {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .remember input[type="checkbox"] {
            margin-right: 8px;
        }

        .remember label {
            font-weight: normal;
            margin: 0;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        p {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        a {
            color: var(--primary-hover);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: var(--error-color);
            font-size: 14px;
            margin: -10px 0 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form id="loginForm" action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <div class="remember">
                <input type="checkbox" name="ingat" value="1" id="remember">
                <label for="remember">Ingatkan saya!</label>
            </div>

            <?php if ($error) : ?> 
                <p class="error-message">Username atau Password salah!</p>
            <?php endif; ?>

            <input type="submit" name="login" value="Login">
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>