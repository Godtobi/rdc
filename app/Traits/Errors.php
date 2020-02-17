<?php

namespace App\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use InfyOm\Generator\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;


trait Errors
{

    public function sendResponse($result, $message)
    {
        //dd(ResponseUtil::makeResponse($message, $result));
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function response(array $errors)
    {
        $messages = implode(' ', array_flatten($errors));
        return Response::json(ResponseUtil::makeError($messages), 400);
    }
}

