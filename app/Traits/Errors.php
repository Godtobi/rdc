<?php

namespace App\Traits;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;


trait Errors
{

    private $response;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response[] = $response;
    }

    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendErrorWithData($result, $message, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($message, $result), $code);
    }


    public function sendArrayErrorWithData(array $result, $message, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($message, $result), $code);
    }

    public function response(array $errors)
    {
        $messages = $this->flatten($errors);
        return Response::json(ResponseUtil::makeError($messages), 400);
    }

    public function flatten($saveErrors, $glue = ' ')
    {
        return implode($glue, Arr::flatten($saveErrors));
    }
}

