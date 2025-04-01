<?php

namespace App\Http\Controllers\user\subscribe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function index(){
        return view('user.subscribepage');
    }
}
