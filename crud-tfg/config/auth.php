<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Valores predeterminados de autenticación
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" de autenticación predeterminado y el
    | "broker" de restablecimiento de contraseñas para su aplicación.
    | Puede cambiar estos valores según sea necesario, pero son un
    | buen comienzo para la mayoría de las aplicaciones.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards de autenticación
    |--------------------------------------------------------------------------
    |
    | A continuación, puede definir cada guard de autenticación para su
    | aplicación. Una gran configuración predeterminada ha sido definida
    | para usted, que utiliza almacenamiento de sesión y el proveedor
    | de usuarios Eloquent.
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios,
    | que define cómo se recuperan los usuarios de su base de datos u
    | otro sistema de almacenamiento utilizado por la aplicación.
    |
    | Soportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [  // ← Agregamos este guard para futuras mejoras en APIs
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
    ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de usuarios
    |--------------------------------------------------------------------------
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios,
    | que define cómo se recuperan los usuarios de su base de datos u
    | otro sistema de almacenamiento utilizado por la aplicación.
    |
    | Si tiene múltiples tablas o modelos de usuarios, puede configurar
    | múltiples proveedores para representar cada modelo/tabla. Estos
    | proveedores pueden ser asignados a cualquier guard adicional
    | de autenticación que haya definido.
    |
    | Soportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Nuevosalumnos::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Restablecimiento de contraseñas
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración especifican el comportamiento de la
    | funcionalidad de restablecimiento de contraseñas de Laravel, incluida
    | la tabla utilizada para almacenar los tokens y el proveedor de
    | usuarios que se invoca para recuperar los usuarios.
    |
    | El tiempo de expiración es el número de minutos que cada token de
    | restablecimiento será considerado válido. Esta característica de
    | seguridad mantiene los tokens de corta duración para que tengan
    | menos tiempo para ser adivinados. Puede cambiar esto según sea
    | necesario.
    |
    | La configuración de "throttle" es el número de segundos que un
    | usuario debe esperar antes de generar más tokens de restablecimiento
    | de contraseñas. Esto evita que el usuario genere rápidamente una
    | gran cantidad de tokens de restablecimiento de contraseñas.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de espera de confirmación de contraseña
    |--------------------------------------------------------------------------
    |
    | Aquí puede definir la cantidad de segundos antes de que expire una
    | ventana de confirmación de contraseña y se le pida a los usuarios
    | que vuelvan a ingresar su contraseña a través de la pantalla de
    | confirmación. Por defecto, el tiempo de espera dura tres horas.
    |
    */

    'password_timeout' => 10800,

];