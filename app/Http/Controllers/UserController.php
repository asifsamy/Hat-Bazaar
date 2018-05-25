<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser()
    {
        return view('admin.user.createUser'); 
    }
    
    public function saveUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        
        $user->save();
        return redirect('/user/add')->with('message', 'User Info Saved Successfully');
    }

    public function manageUser()
    {
        //$users = User::all();
        $users = User::paginate(3); //to show 3 users in page
        //$users = User::simplePaginate(3); //to show 3 users in page
        return view('admin.user.manageUser', ['users'=>$users]);
    }
    
    public function userProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.userProfile', ['user'=>$user]);
    }
    
    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.editUser', ['user'=>$user]);
    }
    
    public function updateUser(Request $request)
    {
        $user = User::where('id', $request->userId)->first();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();
        return redirect('/user/manage')->with('message', 'User Info Updated Successfully');
    }
    
    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/user/manage')->with('message', 'User Info Updated Successfully');
    }
    
    public function changePassword(Request $request)
    {
        $user = User::where('id', $request->userId)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->flush();
        return redirect('/login');
    }
    
}
