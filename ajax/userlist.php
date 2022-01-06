<?php
include __DIR__.'/../app/index.php';
use Models\Users;
use Carbon\Carbon;
validateLogin(true, false);//check account login
requirePerm("admin");
$accountQuery = Users::query();
if(isset($_POST['role'])) {
    $accountQuery->where("role", $_POST['role']);
}

if(isset($_GET['role'])) {
    $accountQuery->where("role", $_GET['role']);
}

$accountList = $accountQuery->get(["id", "name"]);

echo(json_encode($accountList));
?>