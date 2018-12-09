<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class mainController extends Controller
{
    public function main(){
    	return view('term.main');
    }

    public function loginform(){
    	return view('components.users.login_form');
    }

    public function login(){
        return view('components.users.login');
    }

    public function joinform(){
    	return view('components.users.member_join_form');
    }

    public function updateform(){
        $user = User::where('id', \Auth::user()['id'])->first();

        return view('components.users.update_form')->with('member', $user);
    }

    public function update(Request $request){
        User::where('id', \Auth::user()['id'])
        ->update(['name' => $request->name,
                 ]); //encrypt

        return redirect('/');
    }

    public function passwordform(Request $request){
        return view('components.users.password');
    }

    public function passwordre(Request $request){
        User::where('id', \Auth::user()['id'])
            ->update([
                'password' => Hash::make($request->password)]);
        return redirect('/');
    }

    public function about(){
        return view('components.etc.about');
    }

    public function brand(){
        return view('components.etc.brand');
    }


    public function search(Request $request){
        $search = Input::get('search');

        $msgs = DB::table('Board')
            ->where('writer','like','\Auth::user()[\'name\']');
    }

}


