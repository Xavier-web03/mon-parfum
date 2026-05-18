<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un parfum</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        button {
            background: red;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<h2>Supprimer un parfum</h2>

<div class="box">
    <p>Voulez-vous vraiment supprimer ce parfum ?</p>

    <form action="/supprimer-parfum/{{ $article->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Oui, supprimer</button>
    </form>

    <a href="/admin">Annuler</a>
</div>

</body>
</html>
