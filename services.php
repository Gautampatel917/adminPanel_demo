<?php
$pageTitle = "services";
include("includes/header.php");
?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Our services</h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3" style="display: contents;">
                <?php
                alertMessage();
                $serviceQuery = "SELECT * FROM services WHERE status = '0'";
                $result = mysqli_query($conn, $serviceQuery);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $row) { ?>
                            <div class="card shadow-sm" style="margin: auto;">
                                <?php if ($row['image'] != '') : ?>
                                    <img src="<?= $row['image']; ?>" class="rounded" style="width: 25vw; height: 25vw" alt="img">
                                <?php else : ?>
                                    <img src="assets/uploads/services/no-img.png" class="rounded" style="width: 25vw; height: 25vw" alt="img">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5><?= $row['name']; ?></h5>
                                    <p>
                                        <?= $row['small_description']; ?>
                                    </p>
                                    <div>
                                        <a href="service.php?slag=<?= $row['slag'] ?>">read mores</a>
                                    </div>
                                </div>
                                <br>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-12">
                            <h4 class='text-center'>No services found</h4>;
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <h4 class='text-center'>Something Went Wrong!</h4>;
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php include("includes/footer.php"); ?>