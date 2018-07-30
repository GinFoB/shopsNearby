<?php

namespace App\Http\Controllers\API;

use App\Jobs\ShopJob;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(){
        $lang = request('lang');
        $lent = request('lent');

        return DB::select("
            SELECT * FROM `db`.`shops` 
                  where shops.like = 0
                  ORDER BY ((coordinates0- $lang)*(coordinates0- $lang)) + 
                           ((coordinates1 - $lent)*(coordinates1 - $lent)) 
                  ASC ");
    }

    public function likedShops() {
        $lang = request('lang');
        $lent = request('lent');

        return DB::select("
            SELECT * FROM `db`.`shops` 
                  where shops.like = 1
                  ORDER BY ((coordinates0- $lang)*(coordinates0- $lang)) + 
                           ((coordinates1 - $lent)*(coordinates1 - $lent)) 
                  ASC ");
    }

    public function likeShop($id) {
        $shop = Shop::findOrFail($id);
        $shop->like = 1;
        $saved = $shop->save();

        if(!$saved)
            return response()->json(['status' => 404]);

        return response()->json(['status' => 201]);
    }

    public function disLikeShop($id) {
        $shop = Shop::findOrFail($id);
        $shop->like = 2;
        $saved = $shop->save();

        ShopJob::dispatch($shop)->delay(now()->addHour(2));

        if(!$saved)
            return response()->json(['status' => 404]);

        return response()->json(['status' => 201]);
    }


    public function destroy($id){
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return response()->json(null, 201);
    }
}
