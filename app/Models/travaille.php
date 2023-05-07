<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travaille extends Model
{
    use HasFactory;
    protected $table = 'travailles';
    protected $fillable =
    [
        'user_id',
        'user_name',
        'intitule',
        'salaire',
        'horaires',
        'nom_wilaya',
        'localisation',
        'information',
        'diplome',
        'necessite',
        'contrat',
        'approuvé',
        'photo',
    ];
}
