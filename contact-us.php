<?php
$pageTitle = "contact-us";
include("includes/header.php"); ?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Contact us</h4>
    </div>
</div>

<div class="py-5" style="display: flex;">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-body shadow-sm">
                    <h4 class="text-center">Contact Us</h4>
                    <div class="underline"></div>

                    <form action="sendmail.php" method="post">

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="name" class="form-control" name="name">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="mb-3">
                            <label>Phone no:</label>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        <div class="mb-3">
                            <label>Service</label>
                            <input type="text" class="form-control" name="service">
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="contactSubmit" class="btn btn-primary">send</button>
                        </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-6">
                    <h4 class="footer-heading">Contact information</h4>
                    <hr>
                    <p>Address: <?= webSetting('address') ?? '' ?></p>
                    <p>Email: <?= webSetting('email1') ?? '' ?>, <?= webSetting('email2') ?? '' ?></p>
                    <p>Phone no: <?= webSetting('phone1') ?? '' ?>, <?= webSetting('phone2') ?? '' ?></p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>