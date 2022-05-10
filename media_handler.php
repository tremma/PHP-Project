<?php

require 'vars.php';
require 'functions.php';

session_start();

$current_user_id = $_GET['id'];

echo $current_user_id;

$image = $_FILES['image'];


                        if(!is_user_admin($admin))
                            {
                            set_flash_message('danger','<div class="alert alert-danger text-dark" role="alert"><strong>Уведомление!</strong> Вы не можете редактировать эту информацию! </div>');
                             header('Location: users.php');
                             
                        }

                        if(!empty($_FILES['image'])){
							 upload_avatar($image,$current_user_id);

							}
                

                         set_flash_message('success','<div class="alert alert-info text-dark" role="alert">Изображение устновлено!</div>');

                        header('Location: users.php');

?>