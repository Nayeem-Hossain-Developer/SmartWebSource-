<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\City;

class HomeController extends Controller
{
    public function index(Request $request){
        $cities = City::when($request->city,function($query,$city){
            $query->where('city','like','%'.$city.'%');
        })
        ->when($request->state,function($query,$state){
            $query->where('state_name','like','%'.$state.'%');
        })
        ->when($request->country,function($query,$country){
            $query->where('county_name','like','%'.$country.'%');
        })
        ->paginate(10)->withQueryString();
        return Inertia::render('Home',['cities' => $cities]);
    }
}
