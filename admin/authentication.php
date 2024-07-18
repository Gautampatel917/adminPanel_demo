<?php

if (isset($_SESSION['auth'])) {
    if (isset($_SESSION['loggedInUserRole'])) {
        $role = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM users WHERE email='$email' AND role='$role' LIMIT 1";
        
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                logoutSession();
                redirect('../login.php', 'Access Denied');
            }
            else {
                $row = $result -> fetch_assoc();
                if ($row['role'] != 'admin') {
                    logoutSession();
                    redirect('../login.php', 'Access denied');
                }
            }
        }
        else {
            logoutSession();
            redirect('../login.php', 'Some thing went wrong');
        }
    }
}
else {
    redirect('../login.php', 'Login to continue');
}

?>