<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'produit_id',
        'user_id',
        'status',
        'nom_client',
        'quantite',
        'montant',
        'paye',
    ];

    public $incrementing = false;

    protected $primaryKey = 'id';
}
