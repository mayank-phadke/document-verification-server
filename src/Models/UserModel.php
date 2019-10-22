<?php
namespace Src\Models;

class UserModel {

    private $db = null;

    function __construct($db)
    {
        $this->db = $db;
    }

    function isUserValid($username, $password) : bool
    {
        $stmt = $this->db->prepare("SELECT 1 from users WHERE username = ? AND password = ?");
        $result = $stmt->execute([$username, $password]);

        return $stmt->fetchColumn() === '1' ? true : false;
    }
}