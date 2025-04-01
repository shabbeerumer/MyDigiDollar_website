<?php

namespace App\Http\Controllers\user\refarrel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefarrelPageController extends Controller
{
    public function index()
    {
        return view('user.refarrel.refarrel');
    }
}
