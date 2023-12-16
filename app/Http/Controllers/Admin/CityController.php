<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $folderPath;

    public function __construct(){
        $this->folderPath = 'admin.city.';
    }

    public function index(){
        return view($this->folderPath.'index');
    }
}
