<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'introduction',
        'image',
        'address',
        'latitude',
        'longitude',
        'start_time',
        'finish_time',
    ];
    
    public function posts(){
        return $this->belongsToMany(Posts::class);
    }
    
}
?>