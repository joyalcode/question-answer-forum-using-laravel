<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $fillable = [
        'comment'
    ];

    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    public function answer()
    {
    	return $this->belongsTo("App\Question");
    }
}