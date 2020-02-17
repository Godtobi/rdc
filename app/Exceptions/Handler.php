<?php

namespace App\Exceptions;

use App\Traits\Errors;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Auth;

class Handler extends ExceptionHandler
{
    use Errors;
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
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if (config("app.env") == "production") {
            if ($this->shouldReport($exception) && !$this->isHttpException($exception) && !config('app.debug')) {
                $e = new HttpException(500, 'Whoops!');
            }
        }
        $prefix = $request->is('api/*');
        $json = $request->expectsJson();
        $ajax = $request->ajax();
        $check = ($prefix == 'api');
        if ($prefix) {
            if ($exception instanceof ValidationException) {
                $exceptions = $exception->validator->errors()->all();
                return $this->response($exceptions);
            }
            if ($exception instanceof MethodNotAllowedHttpException) {
                return $this->sendError('Method Not Allowed for the action');
            }
            if ($exception instanceof NotFoundHttpException) {
                return $this->sendError('url not found');
            }
            return $this->sendError($exception->getMessage());
        }
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $prefix = $request->is('api/*');
        $json = $request->expectsJson();
        $ajax = $request->ajax();
        $check = ($prefix == 'api');
        return $prefix
            ? $this->sendError($exception->getMessage())
            : redirect()->guest(route('login'));
    }
}
