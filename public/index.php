<?php
require "../bootstrap.php";

use Src\Controller\LoginController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if($uri[1] === "") {
    header(200);
    echo json_encode("THIS IS PHP SERVER!");
} else {
    $controller = null;
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    switch($uri[1]) {
        case "login":
            $controller = new LoginController($dbConnection, $requestMethod);
    }

    $response = $controller->processRequest();
    error_log(var_export($response, true));
    http_response_code($response['http_status_code']);
    if(isset($response["body"])) {
        // error_log(var_export($response["http_status_code"], true));
        // error_log(var_export($response["body"], true));
        echo json_encode($response['body']);
    }
}

