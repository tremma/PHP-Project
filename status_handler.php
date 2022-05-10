<?php

require 'vars.php';
require 'functions.php';

session_start();

$current_id = $_GET['id'];

$status = $_POST['status_selected'];


                        if(!is_user_admin($admin))
                            {
                            set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Вы не можете редактировать эту информацию! </div>');
                             header('Location: users.php');
                             
                        }

                        set_status($status,$current_id);
                         set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Статус установлен!</div>');
                        // header('Location: users.php');

?>