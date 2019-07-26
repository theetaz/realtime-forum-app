<?php


namespace App\Exceptions;


use Exception;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

trait JWTExceptionHandler
{

    public function handle(Exception $e)
    {
        if ($e instanceof TokenExpiredException) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        } else if ($e instanceof TokenInvalidException) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        } else if ($e instanceof JWTException) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        } else {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }


}