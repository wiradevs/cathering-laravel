<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
           // \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'role'=> \App\Http\Middleware\Role::class,
        'checkout.have-cart'=> \App\Http\Middleware\CheckoutHaveCart::class,
        'checkout.login-step-done'=> \App\Http\Middleware\CheckoutLoginStepDone::class,
        'checkout.address-step-done'=> \App\Http\Middleware\CheckoutAddressStepDone::class,
        'checkout.payment-step-done'=> \App\Http\Middleware\CheckoutPaymentStepDone::class,
    ];

    protected function renderHttpException(HttpException $e)
    {
        if (view()->exists('errors.'.$e->getStatusCode()))
        {
            return response()->view('errors.'.$e->getStatusCode(), [], $e->getStatusCode());
        }
        else
        {
            return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
        }
    }
}
