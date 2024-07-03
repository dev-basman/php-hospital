<?php

require __DIR__ . '/controller/admin_controller.php';
use controller\AdminController;
$c = new AdminController();
$c->verify(getallheaders());

?>