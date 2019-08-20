<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;


class SavedRecipe extends Model
{
    public $table = "savedrecipes";

    protected $fillable = [
        'user_id', 
        'recipe_id', 
        'name', 
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
