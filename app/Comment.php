<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment'
    ];

    public function user()
    {
    	return $this->BelongsTo("App\User");
    }

    public function answer()
    {
    	return $this->BelongsTo("App\Answer");
    }
}