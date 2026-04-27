<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu_Commande extends Model
{
    /** @use HasFactory<\Database\Factories\ContenuCommandeFactory> */
    use HasFactory;

    protected $fillable = ["commande_id", "product_id"];
    public $timestamps = false;

    public function commande(){
        return $this->belongsTo(Commande::class);
    }
}
