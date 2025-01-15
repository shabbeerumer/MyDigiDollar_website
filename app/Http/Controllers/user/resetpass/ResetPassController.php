<?php

namespace App\Http\Controllers\user\resetpass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPassController extends Controller
{
    public function index()
    {
        return view('user.resetpasspage');
    }
}
