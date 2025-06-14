<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        return redirect()->route('layouts.dashboardAdmin');
    } elseif ($user->role === 'staff') {
        return redirect()->route('layouts.dashboardStaff');
    // } elseif ($user->role === 'customer') {
    //     return redirect()->route('ayouts.dashboardCustumer');
    } else {
        return redirect()->route('layouts.dashboardCustumer'); // default untuk customer
    }
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
