<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Exceptions\InvalidOrderException;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Your middleware configuration if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($e instanceof AuthorizationException) {
                return response()->view('errors.index', ['exception' => $e->getMessage()], 403);
            }

            if ($e instanceof HttpException) {
                $status = $e->getStatusCode();
                $message = $e->getMessage();

                return response()->view('errors.index', ['exception' => $message], $status);
            }

            if ($e instanceof InvalidOrderException) {
                return response()->view('errors.invalid-order', [], 500);
            }

            // You can add more custom exception handlers here

            return parent::render($request, $e); // Default handling
        });
    })
    ->create();
