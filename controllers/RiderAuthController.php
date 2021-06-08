<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use Session;
use App\Models\Rider;
use Illuminate\Support\Facades\Auth;

class RiderAuthController extends Controller
{

    public function riderIndex()
    {
        return view('auth.rider_login');
    }
    
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            //$this->middleware('guest:user')->except('logout');
            $this->middleware('guest:rider')->except('logout');
    }
      

    public function customRiderLogin(Request $request)
    {
        $this->validate($request, [
            'rider_email' => 'required',
            'rider_password' => 'required',
        ]);

        if (Auth::guard('rider')->attempt(['rider_email' => $request->rider_email, 'rider_password' => $request->rider_password], $request->get('remember'))) {

            return redirect()->intended('rider_dashboard')
                             ->withSuccess('Signed in');
        }
        return redirect("rider_login")->withSuccess('Login details are not valid');


        // $request->validate([
        //     'rider_email' => 'required',
        //     'rider_password' => 'required',
        // ]);
   
        // $credentials = $request->only('rider_email', 'rider_password');
        // if (Auth::guard('rider')->attempt($credentials)) {
        //     return redirect()->intended('rider_dashboard')
        //                 ->withSuccess('Signed in');
        // }
  
        // return redirect("rider_login")->withSuccess('Login details are not valid');
    }



    public function riderRegistration()
    {
        return view('auth.rider_registration');
    }
      

    public function customRiderRegistration(Request $request)
    {  
        $request->validate([
            'rider_name' => 'required',
            'rider_email' => 'required|email|unique:riders',
            'rider_password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->createRider($data);
         
        return redirect("rider_dashboard")->withSuccess('You have signed-in');
    }


    public function createRider(array $data)
    {
      return Rider::create([
        'rider_name' => $data['rider_name'],
        'rider_email' => $data['rider_email'],
        'rider_password' => Hash::make($data['rider_password'])
      ]);
    }    
    

    public function riderDashboard()
    {
        if(Auth::check()){
            return view('rider_dashboard');
        }
  
        return redirect("rider_login")->withSuccess('You are not allowed to access');
    }
    

    public function riderSignOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('rider_login');
    }
}
