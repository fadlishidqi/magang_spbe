<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth()->user();

        if ($user != null) {
            if ($user->status == 'pending') {
                Auth::logout();
                return redirect()->back()->withErrors('ops akun kamu masih belum di approved oleh admin silahkan hubungi admin terlebih dahulu');
            }


            if ($user->getRoleNames()->first() == 'super_admin') {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }

            if ($user->getRoleNames()->first() == 'masyarakat') {
                return redirect()->intended(route('masyarakat', absolute: false));
            }

            if ($user->getRoleNames()->first() == 'pegawai_dinas') {
                return redirect()->intended(route('pegawaiDinas', absolute: false));
            }

            if ($user->getRoleNames()->first() == 'pegawai_individu') {
                return redirect()->intended(route('pegawaiIndividu', absolute: false));
            }
        }

        return back()->withErrors('username or password is wrong');
    }
}
