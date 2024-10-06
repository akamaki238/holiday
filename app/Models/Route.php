<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    public function place(){
        return $this->belongsTo(Place::class);
    }
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
?>