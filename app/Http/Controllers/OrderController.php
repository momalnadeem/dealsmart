<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    function addOrder(Request $req){
        $d = new Order;
        $d->dID=$req->input('dID');
        $d->pID=$req->input('pID');
        $d->qun=$req->input('qun');
        $d->save();
        return $d;
        
    }

    public function showByIdOrder($id){
  
        $d = Order::join('products', 'products.id', '=', 'orders.pID')->where('orders.dID', $id)->get();

         return $d;
    }

    public function billd(){
  
        $d = Order::join('products', 'products.id', '=', 'orders.pID')->get();

         return $d;
    }

    public function orderDelete($id){
        $res = Order::where('id',$id)->delete();
        if($res)
         {
            return ["res"=>"Product has been deleted"];
         }else{
            return ["res"=>"fail to delete"];
         }
       
        }


        
}

