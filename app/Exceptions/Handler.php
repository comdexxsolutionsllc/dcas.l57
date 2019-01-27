<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Opis\Closure\SecurityException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->isJson()) {
            return \Route::respondWithRoute('api.fallback.404');
        }

        if ($exception instanceof SecurityException) {
            return view('errors.security-exception');
        }

        return parent::render($request, $exception);
    }

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
//        if (app()->bound('sentry')) {
//            app('log')->info('Submitted exception to Sentry with id:' . app('sentry')->captureException($exception));
//        }

        parent::report($exception);
    }
}
