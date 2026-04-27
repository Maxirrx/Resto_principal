<?php

namespace App\Jobs;

use App\Models\Contenu_Commande;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

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
        $produits = Contenu_Commande::where("commande_id", $this->commande_id)->get('product_id');
    }
}
