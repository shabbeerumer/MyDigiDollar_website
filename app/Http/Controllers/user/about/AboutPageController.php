<?php

namespace App\Http\Controllers\user\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutPageController extends Controller
{
    public function index(){
        return view('user.about.about');
    }
}
