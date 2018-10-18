<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $request){
        if ($request->isMethod(Request::METHOD_POST)){
            echo $request->ime;
            $user=new User();
            $user->name=$request->ime;
            $user->password=bcrypt($request->lozinka);
            $user->save();
            return redirect()->route('listUsers');
        }
        else
            return view('Users.add');
    }

    public function listUsers()
    {
        $Users=User::all();
        return view('Users.list')->with('Users',$Users);
    }

    public function  deleteUser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->action('UserController@listUsers');
    }
    public function changeUserStatus($id,Request $request){
        $user=User::find($id);
        print_r($user->novi_status());
        $user->status=$user->novi_status();
        $user->save();
        return redirect()->action('UserController@listUsers');

    }
}
