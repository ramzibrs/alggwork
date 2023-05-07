<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wilaya extends Model
{
    use HasFactory;
    protected $table = 'wilayas';
    protected $fillable =
    [
        'nom',
        'numero_du_wilaya',
    ];
}
