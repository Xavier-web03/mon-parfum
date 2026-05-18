<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un parfum</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            background: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
        }
        button:hover {
            background: #0056d2;
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

<h2>Ajouter un parfum</h2>

<form action="/ajouter-parfum" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nom du parfum</label>
    <input type="text" name="nom" required>

    <label>Prix</label>
    <input type="number" name="prix" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Image</label>
    <input type="file" name="image" required>

    <button type="submit">Ajouter</button>
</form>

<a href="/admin">Retour</a>

</body>
</html>
