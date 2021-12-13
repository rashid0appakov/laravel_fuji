<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Startup extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'text', 'city','preview', 'user'];
    protected $fillable = ['name', 'text', 'preview', 'image', 'price_real', 'price_of', 'city', 'user', 'finish'];
    protected $casts = [
        'finish'    => 'date'
    ];
}
