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
        // Cambiar el guard a 'admin' para usar el modelo Administrador
        if (Auth::guard('admin')->attempt($request->only('username', 'password_hash'), $request->filled('remember'))) {
            // Regenerar la sesión después de un login exitoso
            $request->session()->regenerate();

            // Redirigir a la página de dashboard del administrador (ajusta la ruta según corresponda)
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        // Si la autenticación falla, redirigir con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cerrar sesión con el guard 'admin'
        Auth::guard('admin')->logout();

        // Invalidar la sesión y regenerar el token para evitar ataques CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir a la página principal después de cerrar sesión
        return redirect('/');
    }
}
