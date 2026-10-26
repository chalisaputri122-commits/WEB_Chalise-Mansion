<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Chalise-Mansion</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #111;
            color: #222;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 38px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 15px 50px #0008;
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand h1 {
            font-size: 27px;
            letter-spacing: 2px;
            color: #171717;
        }

        .brand span {
            color: #b38a3e;
        }

        .brand p {
            margin-top: 10px;
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #b38a3e;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #171717;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .btn-login:hover {
            background: #b38a3e;
        }

        .error {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 7px;
            background: #fee2e2;
            color: #b91c1c;
            font-size: 13px;
        }

        .success {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 7px;
            background: #dcfce7;
            color: #166534;
            font-size: 13px;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="login-container">

    <div class="brand">
        <h1>CHALISE<span>-MANSION</span></h1>
        <p>Admin Panel · Shoe Store Management</p>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email Admin</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email admin"
                autocomplete="username"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
            >
        </div>

        <button type="submit" class="btn-login">
            LOGIN ADMIN
        </button>
    </form>

    <div class="footer">
        &copy; {{ date('Y') }} Chalise-Mansion. All rights reserved.
    </div>

</div>

</body>
</html>