<?php

require 'vars.php';
require 'functions.php';

session_start();

$current_id = $_GET['id'];

$email = $_POST['email'];
$password = $_POST['password'];



$confirm_password = $_POST['confirm_password'];

$free_email = get_user_by_email($email);

if(!$free_email){

	set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем. </div>');

  header('Location: security.php');

}

if($password != $confirm_password){
	set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Пароли не совпадают</div>');

  header('Location: security.php');
}

 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

 update_main_info($email,$password,$current_id);

 set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Информация изменена!</div>');

header('Location: security.php');
