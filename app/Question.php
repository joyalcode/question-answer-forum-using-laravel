<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','question'
    ];

    public function answers()
    {
    	return $this->hasMany("App\Answer");
    }

    public function comments()
    {
        return $this->hasMany("App\QuestionComment");
    } 

    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    public function tags()
    {
        return $this->belongsToMany("App\Tag");
    }   
}