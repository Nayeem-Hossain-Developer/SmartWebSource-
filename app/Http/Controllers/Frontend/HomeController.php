<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\City;

class HomeController extends Controller
{
    public function index(Request $request){
        $cities = City::when($request->name,function($query,$name){
            $query->where('county_name','like','%'.$name.'%');
        })->paginate(10);
        return Inertia::render('Home',['cities' => $cities]);
    }
}
