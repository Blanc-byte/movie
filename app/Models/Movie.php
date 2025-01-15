<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actors;

class Movie extends Model
{
    use HasFactory;
    
    protected $table = 'movie';
    public $timestamps = false;
    protected $fillable = ['id','name', 'description', 'img_url', 'genre', 'ticket', 'day_film', 'time_film', 'status'];

    public function actors()
    {
        return $this->hasMany(Actors::class, 'movie_id');
    }
}
