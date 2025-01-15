<?php

namespace App\Http\Controllers\user\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountPageController extends Controller
{
    public function index(){
        return view('user.account.account');
    }
}
