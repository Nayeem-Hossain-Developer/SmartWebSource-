<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $folderPath;

    public function __construct(){
        $this->folderPath = 'admin.auth.';
    }

    public function login(){
        return view($this->folderPath.'login');
    }
}
