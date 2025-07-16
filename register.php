<?php
require 'function.php';

if (isset($_POST["register"])) {
    $message = register($_POST);

    if($message === "Register Berhasil") {
        echo "
            <script>
                alert('" . addslashes ($message) . "');
                document.location.href='login.php';
            </script>
        ";
    } else {
       echo "
            <script>
                alert('" . addslashes ($message) . "');
                document.location.href='register.php';
            </script>
        "; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER | INFORMATIKA</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #f8fafc;
            --accent-color: #60a5fa;
            --text-color: #1e293b;
            --light-gray: #e2e8f0;
            --medium-gray: #94a3b8;
            --border-radius: 10px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e6f0ff 100%);
            margin: 0;
            padding: 0;
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.6;
        }

        /* Header */
        header {
            text-align: center;
            background-color: transparent;
            padding: 40px 0 20px;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin: 0;
            position: relative;
            display: inline-block;
        }

        header h1::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        /* Main Content */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Card/Form Container */
        .card {
            background-color: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            box-sizing: border-box;
            font-size: 1rem;
            background-color: white;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: var(--border-radius);
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, var(--primary-dark), #1e3a8a);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(220, 233, 255, 0.7);
            font-size: 0.9rem;
            color: var(--primary-dark);
        }

        /* Responsive Adjustments */
        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
            }
            
            header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>REGISTRASI</h1>
    </header>
    
    <main>
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-4">
                        <label for="password1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                    </div>
                    <div class="mb-4">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary mt-3">Daftar Sekarang</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 Registrasi Web Informatika | All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>