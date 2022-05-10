<?php
session_start();

require_once 'functions.php';

$email = $_POST['email'];

// $password = $_POST['password'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

get_user_by_email($email);

if (!$email) {
  set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем. </div>');

  header('Location: page_register.php');

  exit;

}

set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Регистрация успешна!</div>');

add_user($email, $password);

header('Location: page_login.php');



	















 

 




?>