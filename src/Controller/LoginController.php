<?php

namespace Src\Controller;

use \Src\Models\UserModel;

class LoginController {
    
    private $db;
    private $requestMethod;

    function __construct($db, $requestMethod) {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->userModel = new UserModel($db);
    }

    function processRequest() {
        if($this->requestMethod === "GET") {
            return [
                "http_status_code" => 301,
                "body" => "GET"
            ];
        }
        if($this->requestMethod === "POST") {
            $requestData = json_decode(file_get_contents("php://input"), true);

            $username = $requestData["username"];
            $password = $requestData["password"];

            if($this->userModel->isUserValid($username, $password)) {
                $response["http_status_code"] = 200;
                $response["body"] = [
                    "success" => true,
                    "msg" => "Login Success"
                ];
                return $response;
            }

            $response["http_status_code"] = 401;
            $response["body"] = [
                "success" => false,
                "msg" => "Invalid Username or Password"
            ];
            return $response;
        }
    }
}