<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="login-body">

    <div class="login-wrapper">
        <div class="form-container">
            <h2>Login Admin</h2>
            <p style="text-align: center; margin-bottom: 20px; color: #666;">Selamat Datang! Silakan login untuk
                mengelola sistem.</p>

            <form method="post" action="proses_login.php">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Masukkan Password">
                </div>

                <button type="submit" class="btn" style="width: 100%;">Login</button>
            </form>
        </div>
    </div>

</body>

</html>