<?php
include __DIR__.'/../app/index.php';
use Models\PhongBan;
validateLogin(true, false);//check account login

$columns = [];

$chargeConfig = PhongBan::query();

echo(json_encode($chargeConfig->get()));

?>