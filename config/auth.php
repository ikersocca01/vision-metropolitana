<?php

return [

    /*
    |----------------------------------------------------------------------
    | Authentication Defaults
    |----------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'admin'), // Cambia a 'admin' para usar el guard correspondiente
        'passwords' => env('AUTH_PASSWORD_BROKER', 'administradores'), // Cambiar a 'administradores'
    ],

    /*
    |----------------------------------------------------------------------
    | Authentication Guards
    |----------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Here, we configure the guard for the 'admin' user.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [ // Nuevo guard para la autenticación del administrador
            'driver' => 'session',
            'provider' => 'administradores', // Guard que usa el provider de administradores
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | User Providers
    |----------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application.
    |
    | Configuramos el provider para los administradores.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        'administradores' => [ // Nuevo provider para administrar el modelo Administrador
            'driver' => 'eloquent',
            'model' => App\Models\Administrador::class, // Aquí se especifica el modelo Administrador
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Resetting Passwords
    |----------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | Se configura el restablecimiento de contraseñas para administradores.
    |
    */

    'passwords' => [
        'administradores' => [
            'provider' => 'administradores', // Provider para el modelo Administrador
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Password Confirmation Timeout
    |----------------------------------------------------------------------
    |
    | Aquí defines el tiempo antes de que una ventana de confirmación de
    | contraseña caduque.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];

