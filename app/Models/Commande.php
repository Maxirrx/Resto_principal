<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    /** @use HasFactory<\Database\Factories\CommandeFactory> */
    use HasFactory;

    protected $fillable = ['restaurant_id', 'user_id', 'commande_externe_uuid', 'end'];

    public $timestamps = false;

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
