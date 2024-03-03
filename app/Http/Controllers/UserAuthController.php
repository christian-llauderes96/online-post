<?php

namespace App\Http\Controllers;

use App\Models\Cj_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $validated = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = Cj_users::where("email", $validated['email'])->first();
      
        if ($user && Hash::check($validated['password']."cj_token", $user->password))
        {
            // dd(Auth);
            if(isset($request->remember_me) && !empty($request->remember_me))
            {
                setcookie("email", $request->email, time() + 3600);
                setcookie("password", $request->password, time() + 3600);
                Auth::loginUsingId($user->user_id, true);
            }else{
                setcookie("email","");
                setcookie("password", "");
                Auth::loginUsingId($user->user_id);
            }
            return redirect()->intended('/home'); 
        }
        else
        return back()->withInput()->withErrors(['loginerror' => 'Invalid email or password']);
    }

    public function userRegister(Request $request)
    {
        $validated = $request->validate([
            "fname" => "required",
            "lname" => "required",
            "user_name" => "required|unique:cj_users", // Ensure user_name is unique in the cj_users table
            "email" => "required|email|unique:cj_users", // Ensure email is unique and has a valid email format in the cj_users table
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
        ]);

        $user = new Cj_users();

        // Assign the validated request data to the model's properties
        $user->first_name = $validated['fname'];
        $user->last_name = $validated['lname'];
        $user->user_name = $validated['user_name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']."cj_token");

        // Save the user instance to persist the data into the database
        $user->save();
        // Optionally, you can redirect the user to another page after successful creation
        return redirect()->route('auth.login')->with('success', 'Successfully registered. Please login to your account.');
    }

    public function userLogout(Request $request)
    {
        Auth::logout();

        // Clear the user's session
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/login');
    }
}
