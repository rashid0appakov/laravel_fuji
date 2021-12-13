<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Post extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name', 'text', 'preview'];
    protected $fillable = ['name', 'text', 'preview', 'image'];
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }
}
