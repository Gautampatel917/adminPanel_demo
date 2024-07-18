<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Services
                        <a href="services.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">



                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Service Name</label>
                            <input type="text" name="serviceName" class="form-control" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label>URL / Link</label>
                            <input type="text" name="slag" class="form-control" required>
                        </div> -->

                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea name="small_description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Upload Service Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <h5>SEO Tags</h5>

                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" class="form-control" style="width: 30px; height:30px;">
                        </div>

                        <button type="submit" name="saveService" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>