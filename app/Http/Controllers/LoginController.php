<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('user')
            ->where('username', $request->username)
            ->first();


        if (!$user) {
            return back()
                ->with('error', 'Username atau password salah!')
                ->withInput($request->only('username'));
        }

        $passwordCocok = false;


        if (
            str_starts_with($user->password, '$2y$') ||
            str_starts_with($user->password, '$argon2i$') ||
            str_starts_with($user->password, '$argon2id$')
        ) {

            $passwordCocok = Hash::check(
                $request->password,
                $user->password
            );
        } else {

            $passwordCocok = ($request->password === $user->password);
        }


        if (!$passwordCocok) {
            return back()
                ->with('error', 'Username atau password salah!')
                ->withInput($request->only('username'));
        }

        if (
            !str_starts_with($user->password, '$2y$') &&
            !str_starts_with($user->password, '$argon2i$') &&
            !str_starts_with($user->password, '$argon2id$')
        ) {
            DB::table('user')
                ->where('id_user', $user->id_user)
                ->update([
                    'password' => Hash::make($request->password)
                ]);
        }


        $request->session()->regenerate();

        session([
            'id_user' => $user->id_user,
            'username' => $user->username,
            'role' => $user->role,
        ]);


        return redirect()->route('admin.dashboard');
    }

  
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
