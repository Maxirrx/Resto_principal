<?php

namespace App\Service;

use App\Models\Restaurant;
use Http;

class ResaurantService
{

    public static function GetAllRestaurant()
    {
        return Restaurant::all();
    }

    public static function FindRestaurant($id)
    {
        $resto = Restaurant::find($id);
        $response = "";
        if($resto->name == "Burgouze"){
            $response = Http::get($resto->url . "/products");
        }if($resto->name == "")
        return $response->json();
    }

}
