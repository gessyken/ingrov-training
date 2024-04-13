<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'bulletin_path',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
