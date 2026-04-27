<?php

namespace App\Service;

use App\Jobs\EnvoyerCommande;
use App\Models\Commande;
use App\Models\Contenu_Commande;

class CommandeService
{

    public static function createCommande($resto_id, $client_id, $tableau_produits)
    {
        $commande = Commande::create([
            "restaurant_id" => $resto_id,
            "user_id" => $client_id,
        ]);
        foreach ($tableau_produits as $produit) {
            Contenu_Commande::create([
                "commande_id" => $commande->id,
                "product_id" => $produit
            ]);
        }
        EnvoyerCommande::dispatch($commande->id)->delay(now()->addSeconds(random_int(5, 15)));;
    }

    public static function historique($user_id)
    {
        return Commande::where("user_id", $user_id)->get();
    }

}
