<?php
class Request {
    public static function handleRequest($method, $endpoint, $callback) {
        $requestUri = strtok($_SERVER["REQUEST_URI"], '?');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
             
        if ($requestUri === $endpoint && $requestMethod === $method) {
            $callback();
            exit;
        }
    }
}
?>