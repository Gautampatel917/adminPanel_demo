<?php
$pageTitle = "service";
include("includes/header.php");

if (isset($_GET['slag'])) {
    if (isset($_GET['slag']) == null) {
        redirect('services.php', 'No url found');
    }
} else {
    redirect('services.php', '');
}

$slag = validate($_GET['slag']);
$service = "SELECT * FROM services WHERE status='0' AND slag='$slag' LIMIT 1";
$result = mysqli_query($conn, $service);

if (!$result) {
    redirect('service.php', 'something went wrong');
}
$result = mysqli_fetch_assoc($result);
?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">About service</h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4><?= $result['name'] ?></h4>
                <div class="underline"></div>
                <p>
                    <?= $result['small_description']; ?>
                </p>
                <div>
                    <?php if ($result['image'] != '') : ?>
                        <img src="<?= $result['image']; ?>" class="" style="width:90%; height:70%; margin:auto" alt="img">
                    <?php else : ?>
                        <img src="assets/uploads/services/no-img.png" class="rounded" style="width:80%; height:50%; margin:auto" alt="img"> alt="img">
                    <?php endif; ?>
                </div>
                <p>
                    <?= $result['long_description']; ?>
                </p>
            </div>
            <div class="col-md-4">
                <div class="card card-body shadow-sm">
                    <h4 class="text-center">Book this service</h4>
                    <div class="underline"></div>
                    <form action="code.php" method="post">

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
                            <input type="text" readonly value="<?= $result['name'] ?>" class="form-control" name="service">
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="enquireBtn" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<? include('include/footer.php'); ?>