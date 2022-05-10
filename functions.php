<?php

require 'vars.php';


function get_user_by_email($email){

        $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');	

		$sql = "SELECT * FROM `users` WHERE `email` = ?";

		$statement = $pdo->prepare($sql);

		$statement->execute([$email]);

	     $userEmail = $statement->fetch(PDO::FETCH_ASSOC);

            if($userEmail ) {


            	return $email;
            }

}

// ----------------------------------------------------------

	function add_user($email, $password){

	$pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');	
	
	$sql = 'INSERT INTO users (email,password) VALUES (:email,:password)';

				$statement = $pdo->prepare($sql);

				$statement->execute(['email' => $email, 'password' => $password]);

				$user = $statement->fetch(PDO::FETCH_ASSOC);
					

				// if($user){
                  
			   
				// }
	// header('location: page_login.php');		
}

// -----------------------------------------------------------------
function get_user_id($email){
      $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');    
                    $sql = "SELECT * FROM users WHERE email = :email";
                    $statement = $pdo->prepare($sql);
                    $statement->execute(['email' => $email]);
                    $row = $statement->fetch(PDO::FETCH_ASSOC);

                    return $row['id'];

                   
}
// -------------------------------------------------------------------

	function set_flash_message($name, $message){

		$_SESSION['name'] = $message;

	}
// -----------------------------------------------------------------

function is_admin($email){
	
		if($userEmail == 'super.vt11@yandex.kz' ){

			$login = $userEmail;
	}
}
// ---------------------------------------------------------------------

function is_user_admin($admin){

	$pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "SELECT * FROM `users` WHERE `role` = ?";

    $statement = $pdo->prepare($sql);

	$statement->execute([$admin]);

	$user_admin = $statement->fetch(PDO::FETCH_ASSOC);

    return true;

  };

function show_all_users($admin){
	 $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');	

		$sql = "SELECT * FROM `users` ";

		$statement = $pdo->prepare($sql);

		$statement->execute();

	    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($users as $user) { ?>
	    		
	    		<!-- user -->
                <div class="col-xl-4">
                    <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="oliver kopyov">
                        <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                            <div class="d-flex flex-row align-items-center">
                                <span class="status status-success mr-3">
                                   <?php $img_src = $user['avatar']; ?>
                                    <span class="rounded-circle profile-image d-block " style="background-image:url('img/<?php echo $img_src ?>'); background-size: cover;"></span>
                                </span>
                                <div class="info-card-text flex-1">
                                    <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo $user['name'] ?>
                                        
                                    
                                     <?php

				                        if(is_user_admin($admin))

				                            {?>

				                            	<i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                                        <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                                        </a>
				                             <div class="dropdown-menu">
                                        <a class="dropdown-item" href="edit.php?id=<?php echo $user['id'] ?>">
                                            <i class="fa fa-edit"></i>
                                        Редактировать</a>
                                        <a class="dropdown-item" href="security.php?id=<?php echo $user['id'] ?>">
                                            <i class="fa fa-lock"></i>
                                        Безопасность</a>
                                        <a class="dropdown-item" href="status.php?id=<?php echo $user['id'] ?>">
                                            <i class="fa fa-sun"></i>
                                        Установить статус</a>
                                        <a class="dropdown-item" href="media.php?id=<?php echo $user['id'] ?>">
                                            <i class="fa fa-camera"></i>
                                            Загрузить аватар
                                        </a>
                                        <a href="delete_handler.php?id=<?php echo $user['id'] ?>" class="dropdown-item" onclick="return confirm('are you sure?');">
                                            <i class="fa fa-window-close"></i>
                                            Удалить
                                        </a>
                                    </div>
				                             <?php
				                        }
				                    ?>
				                       
                                    <span class="text-truncate text-truncate-xl"><?php echo $user['status'] ?></span>
                                </div>
                                <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                    <span class="collapsed-hidden">+</span>
                                    <span class="collapsed-reveal">-</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 collapse show">
                            <div class="p-3">
                                <a href="page_profile.php?id=<?php echo $user['id'] ?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    Профиль Пользователя</a>
                                <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    <i class="fas fa-mobile-alt text-muted mr-2"></i><?php echo $user['phone'] ?></a>
                                <a href="mailto:oliver.kopyov@smartadminwebapp.com" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    <i class="fas fa-mouse-pointer text-muted mr-2"></i> <?php echo $user['email'] ?></a>
                                <address class="fs-sm fw-400 mt-4 text-muted">
                                    <i class="fas fa-map-pin mr-2"></i> <?php echo $user['adress'] ?></address>
                                <div class="d-flex flex-row">
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#4680C2">
                                        <i class="fab fa-vk"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#38A1F3">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#E1306C">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end user -->

	    <?php	
	    }

}
// ==================================================================================

// add new user and create functions

function edit_info($name, $job, $phone, $adress,$current_user_id){
    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "UPDATE users SET name=?, job=?, phone=?, adress=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $job, $phone, $adress, $current_user_id]);

     


};

function set_status($status,$current_id){

    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

                            $sql = "UPDATE users SET status=? WHERE id=?";
                            $stmt= $pdo->prepare($sql);
                            $stmt->execute([$status, $current_id]);

                           
};

function upload_avatar($image,$current_user_id){

$name = $image['name'];

$extention = pathinfo($name, PATHINFO_EXTENSION);

$imageName = uniqid() . "." . $extention;

$imagePath = __DIR__.'/img/'.$imageName;

    if(!move_uploaded_file($image['tmp_name'], $imagePath)){

        echo 'Ошибка загрузки изображения!';
    }

    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "UPDATE users SET avatar=? WHERE id = $current_user_id";

    $statement = $pdo->prepare($sql);

    $statement->execute([$imageName]);
    echo $current_user_id;
};

function add__social_links($vk, $tele, $insta,$current_user_id){

    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "UPDATE users SET vk=?, tele=?, insta=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$vk, $tele, $insta, $current_user_id]);
}

 
function update_main_info($email,$password,$current_id){
    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "UPDATE users SET email=?, password=? WHERE id=$current_id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$email, $password]);
}


function delete($current_user_id){
    $pdo = new PDO('mysql:host = localhost;dbname=course_db','root','');

    $sql = "DELETE FROM `users` WHERE id = $current_user_id";

    $statement = $pdo->prepare($sql);

    $statement->execute();
}

?>