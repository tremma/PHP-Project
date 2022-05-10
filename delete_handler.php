<?php

require 'vars.php';
require 'functions.php';

session_start();

$current_user_id = $_GET['id'];

$current_user = $_SESSION['login'];





                        if(!is_user_admin($admin))
                            {
                                $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

                                $sql = "SELECT * FROM `users` WHERE id = $current_user_id";

                                $statement = $pdo->prepare($sql);

                                $statement->execute();

                                $user_changed = $statement->fetch(PDO::FETCH_ASSOC);

                                if($user_changed['email'] != $current_user){

                                    set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Можно редактировать только свой профиль! </div>');
                                    header('Location: users.php');

                                }
                                
                                delete($current_user_id);

                                 set_flash_message('success','<div class="alert alert-info text-dark" role="alert"><strong>Уведомление!</strong> Вы удалили свой аккаунт! </div>');

                                 header('Location: page_register.php');



                        }

                        // если админ

                       $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

                                $sql = "SELECT * FROM `users` WHERE id = $current_user_id";

                                $statement = $pdo->prepare($sql);

                                $statement->execute();

                                $user_changed = $statement->fetch(PDO::FETCH_ASSOC);

                                if($user_changed['email'] != $current_user){

                                    delete($current_user_id);


                                    set_flash_message('success','<div class="alert alert-info text-dark" role="alert"> Аккаунт успешно удалён!</div>');

                                    header('Location: users.php');
                                }

                                else{
        

                                set_flash_message('success','<div class="alert alert-info text-dark" role="alert"> Вы удалили аккаунт администратора!</div>');

                             header('Location: page_register.php');
                                }
                              


                        

?>