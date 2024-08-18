<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function routes(){
        return $this->hasMany(Route::class);
    }
    public function places()
    {
        return $this->hasManyThrough(Place::class, Route::class, 'post_id', 'id', 'id', 'place_id');
    }
}
?>