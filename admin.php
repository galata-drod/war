<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .error-message {
            color: #dc3545;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            color: #007BFF;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .remember-me {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 5px;
        }

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Mockup: Add your authentication logic here
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admin_username = trim($_POST['admin_username']);
        $admin_password = $_POST['admin_password'];
        $remember_me = isset($_POST['remember_me']);

        // Replace with actual admin credentials check
        if ($admin_username == 'admin' && $admin_password == 'password87') {
            $_SESSION['admin'] = true;
            if ($remember_me) {
                setcookie("admin_username", $admin_username, time() + (86400 * 30), "/"); // 30 days
            }
            header('Location: display.php');
            exit();
        } else {
            $error_message = "Invalid admin credentials.";
        }
    }
    ?>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="admin.php" method="POST" onsubmit="return validateForm()">
            <label for="username">Admin Username:</label>
            <input type="text" id="username" name="admin_username" required>

            <label for="password">Password:</label>
            <div class="input-container">
                <input type="password" id="password" name="admin_password" required>
                <i class="toggle-password fas fa-eye" id="togglePassword" onclick="togglePasswordVisibility()"></i>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Remember Me</label>
            </div>

            <input type="submit" value="Log In">
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function validateForm() {
            const username = document.getElementById('username').value.trim();
            if (username.length === 0) {
                alert("Username cannot be empty.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>