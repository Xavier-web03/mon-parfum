<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Nom de la table (si ta table s'appelle "articles")
    protected $table = 'articles';

    // Champs autorisés à être remplis
    protected $fillable = [
        'nom',
        'prix',
        'description',
        'image'
    ];

    // Si tu n'utilises pas created_at / updated_at
    public $timestamps = true;
}
