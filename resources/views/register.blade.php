<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>

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

        .register-box {
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
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1e7e34;
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
            .register-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Créer un compte</h2>

    @if ($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="/register" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mot de passe</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Créer mon compte</button>
    </form>

    <div class="bottom-link">
        <a href="/login">Déjà un compte ? Se connecter</a>
    </div>
</div>

</body>
</html>
