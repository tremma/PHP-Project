<?php

require 'vars.php';
require 'functions.php';

session_start();


$email = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);



$name = $_POST['name'];

$job = $_POST['job'];

$phone = $_POST['phone'];

$adress = $_POST['adress'];

// $status = $_POST['status'];

$image = $_FILES['image'];

// $vk = $_POST['vk'];

// $tele = $_POST['tele'];

// $insta = $_POST['insta'];


get_user_by_email($email);

if (!$email) {
  set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем. </div>');

  header('Location: create_user.php');

  exit;

}



add_user($email, $password);

$current_user_id = get_user_id($email);

edit_info($name, $job, $phone, $adress,$current_user_id);

if(!empty($_FILES['image'])){
	 upload_avatar($image,$current_user_id);

	}

set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Добавлен новый пользователь!</div>');

header('Location: users.php');






?>