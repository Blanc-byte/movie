<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actors;

class Purchase extends Model
{
    use HasFactory;
    
    protected $table = 'purchase';
    public $timestamps = false;
    protected $fillable = ['id','movie_id', 'number_of_tickets', 'total_price', 'status','customer_id','payment_type'];    

}
