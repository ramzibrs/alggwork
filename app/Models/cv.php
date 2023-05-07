<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    use HasFactory;
    protected $table = 'cvs';
    protected $fillable =
    [
        'user_id',
        'user_name',
        'nom',
        'prenom',
        'date_de_naissanse',
        'diplome_formation',
        'adresse',
        'nom_wilaya',
        'numero_de_telephone',
        'adresse_email',
        'cv',
        'approuvé',
        'genre',
    ];
}
