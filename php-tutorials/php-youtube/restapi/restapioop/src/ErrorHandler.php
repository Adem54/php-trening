<?php


class ErrorHandler
{
    public static function handleException(Throwable $throwable)
    {
        //500 error from server, bu 500 server den hata oldugunu gosterir
        http_response_code(500);
        echo json_encode([
            "code"=>$throwable->getCode(),
            "message"=>$throwable->getMessage(),
            "file"=>$throwable->getFile(),
            "line"=>$throwable->getLine()
        ]);
    }


    public static function handleError(
        int $errno, 
        string $errstr,
        string $errfile,
        int $errline
    ):bool 
    {
        throw new ErrorException($errstr, 0 , $errno, $errfile, $errline);
    }
}

?>