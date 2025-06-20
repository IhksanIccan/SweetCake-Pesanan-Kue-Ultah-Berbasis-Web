<?php

namespace App\Http\Controllers\Auth;

use App\Models\penjual;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

    // Cek role user
        $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('adminlihatuser');
    } elseif ($user->role === 'penjual') {
        penjual::create([
        'user_id'=>$user->id
    ]);
        return redirect()->route('lihatprodukku');
    } else {
        return redirect()->route('dashboardpembeli'); // default untuk customer
    }

    // return redirect()->route('dashboard');
     }

    


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
