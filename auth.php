<?php
session_start();

require 'functions.php';

$email = $_POST['email'];

$password = $_POST['password'];


$pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

$sql = "SELECT * FROM `users` WHERE `email` = ?";

$statement = $pdo->prepare($sql);

$statement->execute([$email]);

$user = $statement->fetch(PDO::FETCH_ASSOC);


if($user && password_verify($password, $user['password'])) {

set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Вы авторизировались!</div>');

	$login = $user['email'];

	$_SESSION['login'] = $login;

	header('location: users.php');

 
    exit;
    
}


set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert">Неверный логин и пароль</div>');


header('Location: page_login.php');
