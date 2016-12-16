<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question'
    ];

    public function answers()
    {
    	return $this->hasMany("App\Answer");
    }

    public function user()
    {
    	return $this->BelongsTo("App\User");
    }
}