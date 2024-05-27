<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="close">
        <a href="/combine">< Kembali Ke Home</a>
    </div>
    <div class="layout-login">
        <div class="login-container">
            <h2>Login</h2>
            <form method="POST" action="/login">
                @csrf
                <input type="username" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="submit" value="Login">
            </form>
            <h3>Hanya admin yang bisa login di web</h3>
            <h4>Bukan admin?.. Silahkan <a href="#">download</a> aplikasi</h4>
        </div>
    </div>
</body>
</html>
