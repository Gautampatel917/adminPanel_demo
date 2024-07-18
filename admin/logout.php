<?php

require '../config/function.php';
if (isset($_SESSION['auth'])) {
    logoutSession();
    redirect('../login.php','Logged out in successfully');
}
else{
    echo 'something went wrong';
}

?>