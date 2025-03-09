<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request)
    {

        try {
            // Authenticate the user
            $request->authenticate();

            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect based on user type
            $userRole = auth()->user()->role;

            if ($userRole === USER_ROLE_SUPER_ADMIN || is_null($userRole)) {
                return redirect()->intended(route('dashboard', absolute: false));
            } elseif ($userRole === USER_ROLE_WARD_ADMIN) {
                return redirect()->intended(route('ward.dashboard', absolute: false));
            } elseif ($userRole === USER_ROLE_UNI_ADMIN) {
                return redirect()->intended(route('union.dashboard', absolute: false));
            } else {
                return redirect()->intended(route('upozila.dashboard', absolute: false));
            }
        } catch (ValidationException $e) {
            // Handle validation exceptions (e.g., inactive or invalid credentials)
            return back()
                ->withErrors($e->errors())
                ->withInput($request->only('email', 'remember'));
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
