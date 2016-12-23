<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
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
    	return $this->belongsTo("App\Answer");
    }
}