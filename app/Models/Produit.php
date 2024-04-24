<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom', 'prix'];
    public $primaryKey = 'id';

    public $incrementing = false;
}
