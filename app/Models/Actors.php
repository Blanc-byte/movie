<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Actors extends Model
{
    use HasFactory;
    
    protected $table = 'actors';
    public $timestamps = false;
    protected $fillable = ['id', 'movie_id', 'actors'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
