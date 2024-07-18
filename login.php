<?php
$pageTitle = "Login";
include("includes/header.php");

if (isset($_SESSION['auth'])) {
    // header("Location: index.php");
    redirect('index.php', 'Your already logged in');
}
?>

<div class="py-4 bg-secondly text-center">
    <h4 class="text-white">Login</h4>
</div>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <?php alertMessage() ?>

                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100" name="loginBtn">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
