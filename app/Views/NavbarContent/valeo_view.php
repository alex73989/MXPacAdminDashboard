<?= $this->extend("includes/base"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-5">
                    
                    <div class="card-body">
                        <h4>User Information</h4>
                        <hr>

                        <?php if(count($userAllData)>0):?>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <div class="table-responsive">
                                        <table class = "table">
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <!-- <th>Password</th> -->
                                                <th>Mobile</th>
                                                <!-- <th>Profile Pic</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>UNIID</th>
                                                <th>Activation date</th>
                                                <th>Updated At</th> -->
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            <?php foreach($userAllData as $data): ?>
                                                <tr>
                                                    <td><?= $data->id;?></td>
                                                    <td><?= $data->username;?></td>
                                                    <td><?= $data->email;?></td>
                                                    <!-- <td><?= $data->password;?></td> -->
                                                    <td><?= $data->mobile;?></td>
                                                    <!-- <td><?= $data->profile_pic;?></td>
                                                    <td><?= date("l d M Y h:i:s a", strtotime($data->created_at));?></td>
                                                    <td><?= $data->status;?></td>
                                                    <td><?= $data->uniid;?></td>
                                                    <td><?= date("l d M Y h:i:s a", strtotime($data->activation_date));?></td>
                                                    <td><?= date("l d M Y h:i:s a", strtotime($data->updated_at));?></td> -->
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                            <?php else: ?>
                                                <h5>Sorry! No Information Found</h5>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>