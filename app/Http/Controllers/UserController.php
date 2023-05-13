<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(count($request->post()) > 0)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $record = User::where('email','=',$request->email)->first();
            if($record == null)
            {
                session()->flash('error','Incorrect email. Please enter valid email.');
                return redirect('login');
            }
            else
            {
                if(Hash::check($request->password, $record->password))
                {
                    session()->put('USER_LOGEDIN',true);
                    session()->put('LIVE_SESSION',base64_encode($record->id));
                    return redirect('/');
                }
                else
                {
                    session()->flash('error','Please enter valid password.');
                    return redirect('login');
                }
            }

        }
        else
        {
            return view('login');
        }
    }


    public function logout()
    {
        session()->forget('USER_LOGEDIN');
        session()->forget('LIVE_SESSION');
        session()->flash('success','Logout sucessfully.');
        return redirect('login');
    }

}
