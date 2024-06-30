<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'category' => ['required', 'string', 'in:masyarakat,pegawai_dinas,pegawai_individu'],
            'nik' => ['required_if:category,masyarakat', 'string', 'max:255'],
            'no_telp' => ['required_if:category,masyarakat', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'pending', // Assuming 'pending' status for admin approval
            'nip' => $request->nip ?? null,
            'nik' => $request->nik ?? null,
            'no_telp' => $request->no_telp,
            'username' => $request->username
        ]);

        $role = Role::firstOrCreate(['name' => $request->category]);

        $user->assignRole($role);

        event(new Registered($user));

        // Redirect to appropriate dashboard or confirmation page
        return redirect(route('login'));
    }
}
