<?= $this->extend("includes/base"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<!-- ========== GameCanvas ========== -->
<div>

    
    <div class = "container my-3">
    <h1 class = "text-center">RFID Scan Tag ID</h1>
        <div class = "row">
            <div class = "col-sm-12 col-md-6 text-center">
                <h2 class = "text-center my-2">Type of Communication</h2>
                <select id="config_type" class="form-select form-select-md my-2">
                    <option value="">Select Configuration Type</option>
                    <option value="Admin">TCP/IP</option>
                    <option value="User">Port</option>
                </select>

                <div class="form-group mb-3">
                    <label class = "float-start" for="">Reader IP Address:</label>
                    <span id = "error_empid" class = "text-danger ms-3"></span>
                    <input type="text" class="form-control employeeid" placeholder="Enter Reader IP Address">
                </div>
                <div class="form-group mb-3">
                    <label class = "float-start" for="">Reader Port Number :</label>
                    <span id = "error_username" class = "text-danger ms-3"></span>
                    <input type="text" class="form-control username" placeholder="Enter Reader Port Number">
                </div>
                <div class="form-group mb-3">
                    <label class = "float-start" for="">Host IP Address :</label>
                    <span id = "error_password" class = "text-danger ms-3"></span>
                    <input type="text" class="form-control password" placeholder="Enter Host IP Address">
                </div>
                <div class="form-group mb-3">
                    <label class = "float-start" for="">Host Port Number :</label>
                    <span id = "error_fullname" class = "text-danger ms-3"></span>
                    <input type="text" class="form-control fullname" placeholder="Enter Port Number">
                </div>

                <!-- <?php
                    
                    //calling php serial class
                    // $serial->deviceSet('COM3');
                    // $serial->confBaudRate(9600);
                    // $serial->confParity("none");
                    // $serial->confCharacterLength(8);
                    // $serial->confStopBits(1);
                    // $serial->confFlowControl("none");
                    // $serial->deviceOpen();

                    // $serial->sendMessage("Hello!");
                    // $read=$serial->readPort();

                    // var_dump($read);
                    // echo $read;
                    
                ?> -->

            </div>
            <div class = "col-sm-12 col-md-6 text-center">

                <h2 class = "text-center my-2">Reader Connection</h2>

                <div class = "my-2">
                    <button type="button" class="btn btn-primary">Connect Reader</button>
                    <button type="button" class="btn btn-danger">Disconnect Reader</button>
                </div>

                <div class="table table-bordered table-striped" >
                    <table class = "table" id = "employeeTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tag ID</th>
                            </tr>
                        </thead>
                        <tbody class = "employeedata">
                            <tr>
                                <th scope="row">1</th>
                                <td>TagTesting1</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>TagTesting2</td>
                            </tr>
                        </tbody>
                    </table>
                        
                </div>

                <div class = "my-2">
                    <button type="button" class="btn btn-primary">Start Scan</button>
                    <button type="button" class="btn btn-danger">Stop Scan</button>
                </div>

                
                <div class = "my-2 col-12 rounded border border-dark">
                    <div class = "row">
                        <div class = "col-6 align-self-center">
                            <span>Input :</span>
                        </div>
                        <div class = "col-6 d-flex flex-column">
                            <span class="text-success">Green (While Triggered)</span>
                            <span class="text-danger">Idle (Stop Functioning)</span>
                        </div>
                    </div>
                </div>

                <div class = "my-2 col-12 rounded border border-dark">
                    <div class = "row">
                        <div class = "col-6 align-self-center">
                            <span>Output :</span>
                        </div>
                        <div class = "col-6 d-flex flex-column">
                            <span class="text-success">Green (While Triggered)</span>
                            <span class="text-danger">Idle (Stop Functioning)</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class = "container">
        <div class = "row">
            <div class = "col-sm-12 col-md-6 text-center">
                <div class="btn btn-primary my-3">
                    <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_demo_kit_controller" class="button_rfid_to_scan">BACK</a>
                </div>
            </div>
            <div class = "col-sm-12 col-md-6 text-center">
                <div class="btn btn-primary my-3">
                    <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_canvasMove_controller" class="button_car_physical_demostration">Car Physical Demostration</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ========== GameCanvas ========== -->

<?= $this->endSection(); ?>

<script>