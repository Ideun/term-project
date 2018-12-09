<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class kakaoLoginController extends Controller
{
    public function index(){
        return view('layouts.kakaoLogin');
    }

    public function redirectToProvider(){
        return Socialite::with('kakao')->redirect();
    }

    public function handleProviderCallback()
    {
        $kaUser = Socialite::with('kakao')->user();

        $token = $kaUser->token;
        $id = $kaUser->getId();
        $nickName = $kaUser->getNickname();
        $avatar = $kaUser->getAvatar();

        if (!User::where('email', $id)->exists()) {

        User::create([
            'email' => $id,
            'password' => Hash::make($token),
            'name' => $nickName,
            //'avatar'
        ]);
        }else{
            User::where('email',"$id")->update([
                'password'=>Hash::make($token)
            ]);
        }

        if(Auth::attempt(['email'=>$id,
                          'password'=>$token]))
        {
            return redirect('/');
        }
//        dd(response()->json($kaUser,200,[],JSON_PRETTY_PRINT));
        return response()->json($kaUser,200,[],JSON_PRETTY_PRINT);

    } // ㅇ기서 로그인 처리해준당
}
