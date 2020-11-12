<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [            
            'except' => ['show', 'create', 'store']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>   'required|unique:users|max:50',
            'email' =>  'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success','Laravelの世界へようこそ');
        return redirect()->route('users.show',[$user]);
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.eidt',compact('user'));
    }

    public function update(User $user,Request $request){
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $data = [];
        $data['name'] = $request->name;
        if($request->password){
            $data['password'] = bcrypt($request->name);
        }
        $user->update($data);
        session()->flash('success','個人情報の更新は完了です');
        return redirect()->route('users.show',$user);

    }
}