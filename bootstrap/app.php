<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'isadmin' =>\App\Http\Middleware\AdminMiddleware::class ,
            'authour'=>\App\Http\Middleware\AuthourMiddleware::class,
            'multiacces'=>\App\Http\Middleware\Multidashboard::class
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
