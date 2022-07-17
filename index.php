<?php 
session_start();
// load models
require "config.php";
require "connectDB.php";
require "bootstrap.php";
require "vendor/autoload.php";

// router
$c = $_GET["c"] ?? "listStaff";
$a = $_GET["a"] ?? "listStaff";

session_id() || session_start();

if (!($c == "authentication" && $a == "login")) {
    include "checkLogin.php";
    //Đã login
}

// Check quyền của tài khoản
if (!empty($_SESSION["email"])) {
    $aclService = new AclService();
    $staffRepository = new StaffRepository();
    $staff = $staffRepository->findEmail($_SESSION["email"]);

    if (!$aclService->hasPermission($staff, $c, $a)) {
        $_SESSION["error"] = $aclService->getMessage();
        header("location: index.php");
        exit;
    }
}

$controllerName = ucfirst($c) . "Controller"; // ListStaffController
require "controller/" . $c . "/" . $controllerName . ".php"; // controller/listStaff/ListStaffController.php
$controller = new $controllerName(); // new ListStaffController();
$controller->$a(); 

?>

