<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Social Media Lists
                    <a href="social-media.php" class="btn btn-danger float-end">Add Users</a>
                </h4>
            </div>
            <div class="card-body">

            <?= alertMessage(); ?>

                <form action="code.php" method="POST">
                    <div class="mb-3">
                        <label>Social Media Name</label>
                        <input type="text" name="social_media_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>URL / Link</label>
                        <input type="text" name="url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" class="form-control" style="width: 30px; height:30px;">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="saveSocialMedia" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>