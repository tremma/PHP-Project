<?php

require 'vars.php';
require 'functions.php';

session_start();
$current_id = $_SESSION['current_id'];



$name = $_POST['name'];

$job = $_POST['job'];

$phone = $_POST['phone'];

$adress = $_POST['adress'];

// echo $current_id;

edit_info($name, $job, $phone, $adress,$current_id);
set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Информация успешно обновлена</div>');

header('Location: users.php');
?>