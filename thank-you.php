<?php
$pageTitle = "about";
include("includes/header.php"); ?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-center">Thank You</h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h4>Thank you</h4>
                    <?= alertMessage(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>