<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            color: #333;
        }

        .btn-add {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #0056d2;
        }

        /* 🟦 GRID RESPONSIVE */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .article {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .article img {
            width: 100%;
            max-width: 180px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .article h3 {
            margin: 10px 0 5px;
            color: #333;
        }

        .article p {
            margin: 0;
            font-weight: bold;
            color: #555;
        }

        .btn-delete {
            background: #ff3b3b;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            font-weight: bold;
        }

        .btn-delete:hover {
            background: #d60000;
        }

        /* 📱 Responsive */
        @media (max-width: 480px) {
            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .btn-add {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="top">
    <h2>Liste des parfums</h2>
    <a href="/ajouter-parfum" class="btn-add">Ajouter un parfum</a>
</div>

<div class="grid">
@foreach($articles as $article)
    <div class="article">
        <img src="{{ asset('storage/'.$article->image) }}" alt="Image parfum">

        <h3>{{ $article->nom }}</h3>
        <p>{{ $article->prix }} FCFA</p>

        <form action="/supprimer-parfum/{{ $article->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Supprimer</button>
        </form>
    </div>
@endforeach
</div>

</body>
</html>
