<!DOCTYPE html>
<html>
<head>
    <title>Medhiartis Catalog</title>
    <style>
        body {
            background: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .logo-bar {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            height: auto;
            width: auto;
            padding-top: 200px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 0px);
            text-align: center;
        }

        .welcome-message {
            font-size: 36px;
            margin-bottom: 20px;
            color: #000000;
        }

        .login-button {
            padding: 12px 24px;
            padding-right: 50px;
            padding-left: 50px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 24px;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="logo-bar">
        <div class="logo">
            <img src="dist/img/medhiartis logo.png" alt="Your Company Logo">
        </div>
    </div>
    <div class="container">
        <h1 class="welcome-message">Welcome to Medhiartis Catalog Management Portal</h1>
        <br><br><br><br><br><br><br>
        <a href="{{ route('login') }}" class="login-button">Login</a>
    </div>
</body>
</html>
