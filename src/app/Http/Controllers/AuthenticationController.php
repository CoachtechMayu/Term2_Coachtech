<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller
{
    /* 会員登録ページ */
    public function showRegister()
    {
        return view('register');
    }
    /* 会員登録処理 */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            /*  Auth::attemptのため、ハッシュ化*/
            'password' => Hash::make($request->password),
        ]);

        return redirect('/thanks');
    }
    /* thanksページ */
    public function thanks(Request $request)
    {
        return view('thanks');
    }

    public function showLogin()
    {
        return view('login');
    }

    /* ログイン後 */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        /* Auth::attemptはパスワードがハッシュされている前提でusersテーブルを検索 */
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back();
    }
    /* ログアウト */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
