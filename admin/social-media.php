<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Social Media Lists
                    <a href="social-media-create.php" class="btn btn-primary float-end">Add</a>
                </h4>
            </div>
            <div class="card-body">

            <?= alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php  
                            $social_media = getAll('social_medias');
                            if (mysqli_num_rows($social_media) > 0) {
                                foreach ($social_media as $social_media) {
                                    ?>   
                                    <tr>
                                        <td><?= $social_media['id']; ?></td>
                                        <td><?= $social_media['name']; ?></td>
                                        <td><?= $social_media['url']; ?></td>
                                        <td><?= $social_media['status'] == 1?  'hidden' : 'shown'; ?></td>
                                        <td>
                                            <a href="social-media-edit.php?id=<?= $social_media['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="social-media-delete.php?id=<?= $social_media['id']; ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                        </td>
                                    <tr>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                <tr>
                                    <td colspan='7'>No Record Found</td>
                                </tr>
                                <?php
                            }
                        ?>       
                    </tbody>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>