<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;
    protected $table = 'annonces';
    protected $fillable =
    [
        'user_id',
        'user_name',
        'approuvé',
        'titre',
        'sous_titre',
        'tendance',
        'nom_wilaya',
        'adresse',
        'numero_de_telephone',
        'adresse_email',
        'description',
        'photo',
    ];
}
