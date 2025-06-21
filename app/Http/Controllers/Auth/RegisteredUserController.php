<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\pembeli;
use App\Models\penjual;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:penjual,pembeli'
        ]);

        // Jalankan semua dalam transaction
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            event(new Registered($user));
            Auth::login($user);

            if ($user->role === 'pembeli') {
                pembeli::create([
                    'user_id' => $user->id
                ]);
            } elseif ($user->role === 'penjual') {
                penjual::create([
                    'user_id' => $user->id
                ]);
            }
        });

        // Redirect sesuai role
        return $request->role === 'penjual'
            ? redirect()->route('lihatprodukku')
            : redirect()->route('dashboardpembeli');
    }
}

