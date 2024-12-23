<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'username' => ['required', 'string', 'max:255', 'unique:administradores'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Crear el administrador
        $admin = Administrador::create([
            'username' => $request->username,
            'password_hash' => Hash::make($request->password),
        ]);

        // Llamar al evento de registrado
        event(new Registered($admin));

        // Iniciar sesión con el guard 'admin' para el administrador
        Auth::guard('admin')->login($admin);

        // Redirigir al dashboard del administrador
        return redirect()->route('admin.dashboard');
    }
}
