<?php 

include "../controllers/c_login.php";

$login = new c_login();


try {












$email
$pass = $_POST['pass'];

$login->login($email, $pass);
}elseif ($_GET['aksi'] == 'logout') {
$login->logout();
}

} catch (Exception $e) {
    echo $e->getMessage();
}





?>