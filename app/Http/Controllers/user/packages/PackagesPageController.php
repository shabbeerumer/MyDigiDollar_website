<?php

namespace App\Http\Controllers\user\packages;

use App\Http\Controllers\Controller;
use App\Models\ApprovedUser;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackagesPageController extends Controller
{
    public function index(){
        return view('user.packages');
   }

   // Submit user request
   public function submitRequest(Request $request)
   {
      
    $userdata = new UserRequest();
    $userdata->user_id = Auth::user()->id; 
    $userdata->username = $request->username;
    $userdata->email = $request->email;
    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $image->move('image', $imagename);
    $userdata->image = $imagename;
    $userdata->package = $request->Package_Name;
    $userdata->deposit_amount = $request->Deposit_Amount;
    $userdata->save();
    return redirect()->back()->with('success', 'Your request is going to admin. admin activated your package in 24 hours.');
   }

   // Admin response
   public function respondRequest(Request $request, $id)
   {
       $userRequest = Request::find($id);

       if (!$userRequest) {
           return response()->json(['message' => 'Request not found!'], 404);
       }

       if ($request->input('status') === 'approved') {
           // Save to approved users
           ApprovedUser::create([
               'name' => $userRequest->name,
               'email' => $userRequest->email,
               'package' => $userRequest->package,
           ]);
       }

       // Update status of request
       $userRequest->update(['status' => $request->input('status')]);

       return response()->json(['message' => 'Request processed successfully!']);
   }

   

   
}
