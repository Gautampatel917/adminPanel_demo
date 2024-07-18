<?php

require 'config/function.php';
// include('admin/code.php');

if (isset($_POST['loginBtn'])) {
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

    if ($email != null && $password != null) {
        // $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashPassword = $row['password'];

            if (password_verify($password, $hashPassword)) {
                // Password matches, proceed with login
                $_SESSION['auth'] = true;
                $_SESSION['loggedInUserRole'] = $row['role'];
                $_SESSION['loggedInUser'] = [
                    'name' => $row['name'],
                    'email' => $row['email']
                ];

                if ($row['role'] == 'admin') {
                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Your account has been ban please contact to the admin');
                    } else {
                        redirect('admin/index.php', 'Logged In successfully');
                    }
                } else {
                    redirect('index.php', 'Logged In successfully');
                }
            } else {
                // Invalid password
                redirect('login.php', 'Invalid Password');
            }
        } else {
            // Invalid email
            redirect('login.php', 'Invalid Email');
        }
    } else {
        // Missing email or password
        redirect('login.php', 'All fields is mandatory');
    }
}
