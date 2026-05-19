<?php

use App\Models\Admin;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    // 🔵 YANG DIUBAH 1: Default guard diubah dari 'web' menjadi 'admin'
    'defaults' => [
        'guard' => 'admin',  // ← UBAH: dari 'web' jadi 'admin'
        'passwords' => 'admins', // ← UBAH: dari 'users' jadi 'admins'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        // 🔵 YANG DIUBAH 2: Hanya guard 'admin' yang diperlukan
        // 'web' bisa dihapus atau dikomentari
        // 'web' => [
        //     'driver' => 'session',
        //     'provider' => 'users',
        // ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        // 🔵 YANG DIUBAH 3: Hanya provider 'admins' yang diperlukan
        // 'users' bisa dihapus atau dikomentari
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => env('AUTH_MODEL', User::class),
        // ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => Admin::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        // 🔵 YANG DIUBAH 4: Ganti dari 'users' menjadi 'admins'
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];