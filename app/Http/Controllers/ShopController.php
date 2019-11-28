<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Like;
use Auth;
use DB;

class ShopController extends Controller
{



    // make sure that users cant access to any of this class methods unless they logged in 
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function nearbyShops(){

        $user_id  = Auth::user()->id;
        $user_lat = Auth::user()->lat;
        $user_lng = Auth::user()->lng;



        //  shops by the nearest to the user
        //  calculating the distance between every shop 
        //  and the current user and order them by the claculated distance
        //  dont know if that realy the way to calculate the distance on a geographioc plan or not... 
        //  but it seems working so far


        $shops = DB::table("shops")
                ->whereNotIn('id',  DB::table('likes')
                                    ->where('user_id','=',$user_id)
                                    ->where('like','=',1)
                                    ->select('shop_id'))
                ->whereNotIn('id',  DB::table('likes')
                                    ->where('user_id','=',$user_id)
                                    ->where('like','=',0)
                                    ->where('created_at','>=',DB::raw('DATE_SUB(NOW(), INTERVAL 2 HOUR)'))
                                    ->select('shop_id'))
                ->orderByRaw("SQRT(POW( ? -lat,2)+POW( ? -lng,2)) ASC",[$user_lat,$user_lng])
                ->paginate(21);

        //dd($shops);
        return view('shops.index',[
            'shops'=> $shops,
        ]);    
    }



    

    public function preferredShops(){

        $user_id  = Auth::user()->id;
        $user_lat = Auth::user()->lat;
        $user_lng = Auth::user()->lng;
        

        $shops = DB::table("shops")
                ->whereIn('id', DB::table('likes')
                                ->where('user_id','=',$user_id)
                                ->where('like','=',1)
                                ->select('shop_id'))
                ->orderByRaw("SQRT(POW( ? -lat,2)+POW( ? -lng,2)) ASC",[$user_lat,$user_lng])
                ->paginate(21);

        return view('shops.preferred',[
            'shops'=> $shops,
        ]);    
    }





    public function action($id,$like){
        if($like=='true' || $like=='false'){
            $n_like = new Like();
            $n_like->user_id = Auth::user()->id;
            $n_like->shop_id = $id;
            $n_like->like = $like=='true' ? 1:0;
            $n_like->save();
            return redirect()->route('nearby');
        }
        return abort(404);
    }


 

    public function unlike($id){
        DB::table('likes')->where('shop_id', '=', $id)->delete();
        return redirect()->route('preferred');
    }
}
