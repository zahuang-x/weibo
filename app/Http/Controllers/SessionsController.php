<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request,[
            'email' =>  'required|email|max:255',
            'password' =>   'required'
        ]);
        if(Auth::attempt($credentials,$request->has('rememberme'))){
            session()->flash('success','お帰りなさい');
            $fallback = route('users.show',Auth::user());
            return redirect()->intended($fallback);
        }else{
            session()->flash('danger','名前またパスワードは間違いないでしょうか');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','ログアウトしました');
        return redirect('login');
    }
}
