<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="form-box login-box">
            <img src="NL.png" alt="R&R Car Rental Logo" class="logo">
            <h2>Login</h2>
            <p>Get a R&R account and find your joy - wherever you are or wherever you're going</p>
            <form id="login-form" method="post" action="loginTW2.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="options">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
            <p class="register-link">Don't have an account? <a href="#" id="show-register">Register</a></p>
        </div>

        <div class="form-box register-box" style="display: none;">
            <img src="NL.png" alt="R&R Car Rental Logo" class="logo">
            <h2>Register</h2>
            <p>Create your R&R account and start your journey with us!</p>
            <form id="register-form" method="post" action="signupTW2.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm-password" placeholder="Confirm Password" required>
                <button type="submit" class="login-button">Register</button>
            </form>
            <p class="register-link">Already have an account? <a href="#" id="show-login">Login</a></p>
        </div>
    </div>

    <script>
        const showRegister = document.getElementById('show-register');
        const showLogin = document.getElementById('show-login');
        const loginBox = document.querySelector('.login-box');
        const registerBox = document.querySelector('.register-box');

        showRegister.addEventListener('click', () => {
            loginBox.style.display = 'none';
            registerBox.style.display = 'block';
        });

        showLogin.addEventListener('click', () => {
            registerBox.style.display = 'none';
            loginBox.style.display = 'block';
        });
    </script>
</body>
</html>
