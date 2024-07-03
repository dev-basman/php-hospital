<?php

namespace controller;

require __DIR__ . '/../model/admin.php';
require __DIR__ . '/../vendor/db.php';
use models\Admin;
use vendor\DB;

class AdminController
{

    public function verify($headers): ?bool
    {
        if (!isset($headers['name']) || !isset($headers['password'])) {
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(['error' => "UnAuthorized"]);
            exit();
        }
        $name = $headers['name'];
        $password = $headers['password'];
        $admin = Admin::createWithNameAndPassword($name, $password);
        $res = mysqli_query(DB::con(), "SELECT * FROM admins where name_a = '$name' AND password ='$password'");
        if ($res->num_rows == 0) {
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(['error' => "UnAuthorized"]);
            exit();
        }
        return true;
    }


}

?>