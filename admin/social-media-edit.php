<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Social Media Lists
                        <a href="social-media.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <?php
                        $paramResult = checkParamId('id');
                        $id = $_GET['id'];

                        if (!is_numeric($paramResult)) {
                            echo '<h5>' . $paramResult . '</h5>';
                            return false;
                        }
                        $social_media = getById('social_medias', checkParamId('id'));

                        // $social_media = getById($paramResult);
                        if ($social_media['status']) {
                        ?>

                            <input type="hidden" name="socialId" value="<?= $social_media['data']['id']; ?>">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo $social_media['data']['name']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>URL</label>
                                        <input type="text" name="url" value="<?php echo $social_media['data']['url']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <br>
                                        <input type="checkbox" name="status" <?php $social_media['data']['status'] == true ? 'checked' : ''; ?> style="width: 30px; height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button name="updateSocialMedia" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                            echo '<h5>' . $social_media['message'] . '</h5>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>