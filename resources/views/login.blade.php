<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.90);
            padding: 30px;
            width: 100%;
            max-width: 350px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            backdrop-filter: blur(5px);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #0056d2;
        }

        .bottom-link {
            margin-top: 15px;
            text-align: center;
        }

        .bottom-link a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        .bottom-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Connexion Admin</h2>

    @if($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mot de passe</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <div class="bottom-link">
        <a href="/register">Créer un compte</a>
    </div>
</div>

</body>
</html>
