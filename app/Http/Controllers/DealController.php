<?php

namespace App\Http\Controllers;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
  

    function addDeal(Request $req){
        $d = new Deal;
        $d->name=$req->input('name');
        $d->pno=$req->input('pno');
        $d->emi=$req->input('emi');
        $d->address=$req->input('address');
        $d->conf= "waiting";
        $d->visit="uncheck";
        $d->comp="process";
        $d->save();
        return $d;
        
    }
    public function showByIdDeal($id)
{
//    return "hello";
    return Deal::find($id);
}


public function billd(){
  
    $d = Deal::join('orders', 'deals.id', '=', 'orders.dID')->get();

     return $d;
}

public function dealList(){
    return Deal::all();
  }
public function vUc(){
    return Deal::where('visit','uncheck')->get();
}
public function vc(){
    return Deal::where('visit','check')->get();
}
public function dealCheck($id, Request $req){
    $d = Deal::find($id);
    $d->visit='check';
    $d->save();
    return $d; 
    }

    public function confi($id, Request $req){
        $d = Deal::find($id);
        $d->comp='Completed';
        $d->save();
        return $d; 
        }
    
        public function cnt(){
            return Deal::where('visit','uncheck')->count();;
        }
}
