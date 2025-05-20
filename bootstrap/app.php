<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // ✅ ini menambahkan dukungan untuk API routes
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function () {
        return [
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ];
    })

    ->withExceptions(function (Exceptions $exceptions) {
        // kamu bisa isi penanganan exception di sini jika perlu
    })
    ->create();
