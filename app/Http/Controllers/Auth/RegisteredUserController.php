<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CustomerProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function regis(): View
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:customer,staff',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Buat profil jika role customer
        // if ($request->role === 'customer') {
        //     CustomerProfile::create([
        //         'user_id' => $user->id,
        //         'alamat' => '-', // isi default
        //         'telepon' => '-', // isi default
        //     ]);
        // }

        Auth::login($user);

        // Arahkan ke dashboard sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'staff') {
            return redirect()->route('layouts.dashboardStaff');
        } else {
            return redirect()->route('layouts.dashboardCustumer');
        }
    }
}
