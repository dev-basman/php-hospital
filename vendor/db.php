<?php
namespace vendor;

class DB
{


    public static function con()
    {
        return mysqli_connect("localhost", "root", "", "mc");
    }
}
?>