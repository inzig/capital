<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (config('app.debug') === false) {
            return $this->handleExceptions($exception);
        }

        return parent::render($request, $exception);
    }

    private function handleExceptions($e)
    {
        $exception = \Symfony\Component\Debug\Exception\FlattenException::create($e);
        $statusCode = $exception->getStatusCode($exception);

        if ($e instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($statusCode == 403 && $e instanceof HttpException == TRUE) {
            return response()->view('errors.403', [], 403);
        }

        return response()->view('errors.500', [], 500);
    }
}
