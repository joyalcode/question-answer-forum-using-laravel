<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer'
    ];

    public function comments()
    {
    	return $this->hasMany("App\Comment")
    }

    public function user()
    {
    	return $this->BelongsTo("App\User");
    }

    public function question()
    {
    	return $this->BelongsTo("App\Question");
    }    
}