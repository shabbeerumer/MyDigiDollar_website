<?php

namespace App\Http\Controllers\user\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index(){
        return view('user.contact');
    }
}
