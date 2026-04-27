<?php

namespace App\Jobs;

use App\Models\Commande;
use App\Models\Contenu_Commande;
use App\Models\Restaurant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Http;

class EnvoyerCommande implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $commande_id)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $commande = Commande::find($this->commande_id);
        $restaurant = Restaurant::find($commande->restaurant_id);
        $produits = Contenu_Commande::where("commande_id", $this->commande_id)->pluck('product_id')->toArray();
        $response = Http::post($restaurant->url . '/order', ['products' => $produits,]);        //conversion vers l api de restaurant
        if ($response->successful()) {
            $data = $response->json();
            $commande->commande_externe_uuid = $data;
            $commande->end =  true;
            $commande->save();
        }
    }
}
