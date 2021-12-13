<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'text'];
    protected $with = ['user'];
    public function commentable(){
        return $this->morphTo();
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
