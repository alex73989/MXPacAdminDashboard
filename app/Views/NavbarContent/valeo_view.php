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
                                <div class="col-md-12 mt-2">

                                    <!-- Add Records Modal -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Employee Details
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Employee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?= form_open(); ?>
                                                    <div class="form-group mb-3">
                                                        <label for="">Employee ID :</label>
                                                        <input type="text" name="employeeid" id="employeeid" class="form-control" placeholder="Enter Your Employee ID" value='<?= set_value('employeeid')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'employeeid')?>
                                                        </span>
                                                    </div>
                                                    <!-- <div class="form-group mb-3">
                                                        <label for="">Username :</label>
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username" value='<?= set_value('username')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'username')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Full Name :</label>
                                                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Your Full Name" value='<?= set_value('fullname')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'fullname')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Mobile Number :</label>
                                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Mobile Number" value='<?= set_value('mobile')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'mobile')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Email Address :</label>
                                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Address" value='<?= set_value('email')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'email')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3 ">
                                                        <label for="">Password :</label>
                                                        <input type="text" name="password" id="password" class="form-control" placeholder="Enter Your Password" value='<?= set_value('password')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'password')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Card ID :</label>
                                                        <input type="text" name="cardid" id="cardid" class="form-control" placeholder="Enter Your Card ID" value='<?= set_value('cardid')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'cardid')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group :</label>
                                                        <input type="text" name="usergroup" id="usergroup" class="form-control" placeholder="Enter Your User Group" value='<?= set_value('usergroup')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'usergroup')?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Group Description :</label>
                                                        <input type="text" name="groupdescription" id="groupdescription" class="form-control" placeholder="Enter Your Group Description" value='<?= set_value('groupdescription')?>'>
                                                        <span class = "text-danger">
                                                            <?= display_error($validation, 'groupdescription')?>
                                                        </span>
                                                    </div> -->
                                                <?= form_close(); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="add">Add Records</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="table-responsive">
                                        <table class = "table">
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <!-- <th>Password</th> -->
                                                <!-- <th>Mobile</th> -->
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
                                                    <!-- <td><?= $data->mobile;?></td> -->
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