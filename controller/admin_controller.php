<?php

namespace controller;

require __DIR__ . '/../model/admin.php';
require __DIR__ . '/../vendor/db.php';
use models\Admin;
use vendor\DB;

class AdminController
{
    public ?Admin $admin;
    public function verify($headers): ?admin
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


        while ($row = mysqli_fetch_object($res)) {
            $admin = new Admin($row->name_a, $row->password, $row->id_a);
        }
        return $admin;
    }


}

?>