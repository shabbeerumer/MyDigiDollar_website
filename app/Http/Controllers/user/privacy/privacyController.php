<?php

namespace App\Http\Controllers\user\privacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class privacyController extends Controller
{
    public function index(){
        return view('user.privacy');
    }
}
