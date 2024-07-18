<?php

if (isset($_POST['contactSubmit'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $service = validate($_POST['service']);
    $message = validate($_POST['message']);

    
}

?>