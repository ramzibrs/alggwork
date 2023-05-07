<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    use HasFactory;
    protected $table = 'projets';
    protected $fillable =
    [
        'user_id',
        'user_name',
        'approuvé',
        'intitule',
        'type',
        'besoins',
        'bénéficier',
        'condition',
        'tendance',
        'nom_wilaya',
        'adresse',
        'numero_de_telephone',
        'adresse_email',
        'description',
        'photo',
    ];
}
