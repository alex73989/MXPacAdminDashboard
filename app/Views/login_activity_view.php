<?= $this->extend("includes/base") ?>

    <?= $this->section('welcome_username'); ?>
        <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
    
    <?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-5">
                    
                    <div class="card-body">
                        <h4>Login Activity</h4>
                        <hr>

                        <?php if(count($login_info)>0):?>
                            <table class = "table">
                                <tr>
                                    <th>Id</th>
                                    <th>Login Time</th>
                                    <th>Logout Time</th>
                                    <th>User Agent</th>
                                    <th>IP Addresses</th>
                                </tr>
                                <?php foreach($login_info as $info): ?>
                                    <tr>
                                        <td><?= $info->id;?></td>
                                        <td><?= date("l d M Y h:i:s a", strtotime($info->login_time));?></td>
                                        <td>
                                            <?php if($info->logout_time == '0000-00-00 00:00:00'): ?>
                                            <span style="color:green">Now, You are logged in</span>
                                            <?php else: ?>
                                            <?= date("l d M Y h:i:s a", strtotime($info->logout_time));?>
                                            <?php endif; ?>
                                            
                                        </td>
                                        <td><?= $info->agent;?></td>
                                        <td><?= $info->ip;?></td>
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

<?= $this->endSection() ?>