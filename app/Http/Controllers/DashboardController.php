<?php


namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

    public function index() {
    /*    $api= "579dbb7d3a06fe2fe7d5635d0cb37303";
        $orders = order::where('nv', NULL)
            ->select('phone')
            ->get();

        foreach ($orders as $order) {
            $response = Http::get("http://api.scrapestack.com/scrape?access_key=".$api."&url=https://ext.riskblacklist.com/trial/tel.php?f=".$order->phone);
            if (preg_match('/Delivered(.*?)<\/td>/', $response, $match) == 1) {
                dd(preg_replace('/\D/', '', $match[1]));
            }
            dd($response->body());
        }
*/
        $orders = order::join('products', 'orders.product_id','products.id')
            ->join('algeria_cities', 'orders.commune_id', 'algeria_cities.id')
            ->select('orders.*', 'products.name',DB::raw("(`algeria_cities`.`prix` + `products`.`prix`) as prix") ,'products.img as img', 'algeria_cities.wilaya_code as wilaya')
            ->get();


        return view('dashboard',compact('orders'));
    }

    public function accept_order(Request $request){
        $orders = order::where('id', $request->id)
                         ->update(['status' => 1]);

        return back()->withInput();
    }

    public function refuse_order(Request $request){
        $orders = order::where('id', $request->id)
            ->update(['status' => 0]);

        return back()->withInput();
    }

    public function annulled_order(Request $request){
        $orders = order::where('id', $request->id)
            ->update(['status' => 2]);

        return back()->withInput();
    }




}
/*
 * $response = Http::get("https://ext.riskblacklist.com/trial/tel.php?f="."0668407723");
        dd(explode(":",$response->body()));
        $orders = DB::table('orders')
            ->join('products', function ($join) {
                $join->on('orders.product_id', 'products.id')
                    ->where('products.id', '=', 5);
            })
            ->get();*/
