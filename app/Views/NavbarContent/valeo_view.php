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
                            <div class="row">
                                <div class="col-md-12 mt-4">

                                    <!-- Add Records Modal -->
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-outline-info btn-sm" >
                                        Add Employee Details
                                    </button> -->
                                    <div class = "container add_employee_container_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#employeeModal">
                                            <span>Add Employee Details</span>
                                        </a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="employeeModalLabel">Add Employee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group mb-3">
                                                        <label for="">Employee ID :</label>
                                                        <span id = "error_empid" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control employeeid" placeholder="Enter Your Employee ID">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Username :</label>
                                                        <span id = "error_username" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control username" placeholder="Enter Your Username">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Password :</label>
                                                        <span id = "error_password" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control password" placeholder="Enter Your Password">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Full Name :</label>
                                                        <span id = "error_fullname" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control fullname" placeholder="Enter Your Full Name">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Type :</label>
                                                        <span id = "error_usertype" class = "text-danger ms-3"></span>
                                                        <select name="usertype" class="usertype form-select form-select-md">
                                                            <option value="" selected disabled>Select User Type</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group ID :</label>
                                                        <span id = "error_usergroup_id" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control usergroup_id" placeholder="Enter Your User Group ID">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group Name :</label>
                                                        <span id = "error_usergroup_name" class = "text-danger ms-3"></span>
                                                        <select name="usergroup_name" id="usergroup_name" class="usergroup_name form-select form-select-md">
                                                            <option value="" selected disabled>Select User Group Name</option>
                                                            <?php foreach($userlevel as $key => $userlevelkey){ ?>
                                                                <option value="<?= $userlevelkey['id'] ?>"> <?= $userlevelkey['usergroup_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group Description :</label>
                                                        <span id = "error_usergroup_descrip" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control usergroup_descrip" placeholder="Enter Your User Group Description">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Contact No :</label>
                                                        <span id = "error_contact_no" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control contact_no" placeholder="Enter Your Contact No">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Card ID :</label>
                                                        <span id = "error_card_id" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control card_id" placeholder="Enter Your Card ID">
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary ajaxemployee-add">Add Records</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- View Records Modal -->
                                    <div class="modal fade" id="EmployeeViewModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="employeeModalLabel">View Employee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>
                                                        ID:
                                                        <span class = "main_id_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Employee ID:
                                                        <span class = "empid_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Username:
                                                        <span class = "username_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Password:
                                                        <span class = "password_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Full Name:
                                                        <span class = "fullname_view"></span>
                                                    </h4>
                                                    <h4>
                                                        User Type:
                                                        <span class = "usertype_view"></span>
                                                    </h4>
                                                    <h4>
                                                        User Group ID:
                                                        <span class = "usergroup_id_view"></span>
                                                    </h4>
                                                    <h4>
                                                        User Group Name:
                                                        <span class = "usergroup_name_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Group Description:
                                                        <span class = "usergroup_descrip_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Contact No:
                                                        <span class = "contact_no_view"></span>
                                                    </h4>
                                                    <h4>
                                                        Card ID:
                                                        <span class = "card_id_view"></span>
                                                    </h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Records Modal -->
                                    <div class="modal fade" id="EmployeeEditModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="employeeModalLabel">Edit Employee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id = "emp_main_id">
                                                    <div class="form-group mb-3">
                                                        <label for="">Employee ID :</label>
                                                        <input type="text" id = "emp_id" class="form-control employeeid" placeholder="Enter Your Employee ID">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Username :</label>
                                                        <input type="text" id = "emp_username" class="form-control username" placeholder="Enter Your Username">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Password :</label>
                                                        <input type="text" id = "emp_password" class="form-control password" placeholder="Enter Your Password">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Full Name :</label>
                                                        <input type="text" id = "emp_fullname" class="form-control fullname" placeholder="Enter Your Full Name">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Type :</label>
                                                        <select id="emp_usertype" class="usertype form-select form-select-md">
                                                            <option value="">Select User Type</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group ID :</label>
                                                        <input type="text" id = "emp_usergroup_id" class="form-control usergroup_id" placeholder="Enter Your User Group ID">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group Name :</label>
                                                        <input type="text" id = "emp_usergroup_name" class="form-control usergroup_name" placeholder="Enter Your User Group Name">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">User Group Description :</label>
                                                        <input type="text" id = "emp_usergroup_descrip" class="form-control usergroup_descrip" placeholder="Enter Your User Group Description">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Contact No :</label>
                                                        <input type="text" id = "emp_contact_no" class="form-control contact_no" placeholder="Enter Your Contact No">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Card ID :</label>
                                                        <input type="text" id = "emp_card_id" class="form-control card_id" placeholder="Enter Your Card ID">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary ajaxemployee-update">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Records Modal
                                    <div class="modal fade" id="EmployeeDeleteModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="employeeModalLabel">Delete Employee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id = "main_delete_id">
                                                    <h4>Are you sure want to delete this data ? </h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger ajaxemployee-delete" data-bs-dismiss="modal">Yes. Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    

                                    <div class="table table-bordered table-striped mt-3" >
                                        <table class = "table" id = "employeeTable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Employee ID</th>
                                                    <th>Username</th>
                                                    <th>Full Name</th>
                                                    <th>Created at</th>
                                                    <th class = "nosort">Action</th>
                                                </tr>
                                            </thead>
                                            <!-- <tbody class = "employeedata">

                                            </tbody> -->
                                        </table>
                                            
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

<?= $this->section("scripts"); ?>

<script>

    // Load Employee Data Into Webpage
    function loademployee(){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/valeo/getdata",
            success: function(response){
                // console.log(response.employee_table);
                // $.each(response.employee_table, function(key, value){
                //     // console.log(value['employeeid']);
                //     $('.employeedata').append(
                //         '<tr>\
                //         <td class = "main_id">'+value['id']+'</td>\
                //         <td>'+value['employeeid']+'</td>\
                //         <td>'+value['username']+'</td>\
                //         <td>'+value['fullname']+'</td>\
                //         <td>'+value['created_at']+'</td>\
                //         <td>\
                //             <a href = "#" class = "badge btn btn-info view_btn">VIEW</a>\
                //             <a href = "#" class = "badge btn btn-primary edit_btn">EDIT</a>\
                //             <a href = "#" class = "badge btn btn-danger delete_btn">Delete</a>\
                //         </td>\
                //     </tr>');
                // });
                $('#employeeTable').DataTable({
                    "data": response.employee_table,
                    "scrollX": true,
                    "pagingType": "full_numbers",
                    dom: 
                        "<'row'<'col-sm-12 col-md-12 col-lg-3'l><'col-sm-12 col-md-12 col-lg-6 text-center'B><'col-sm-12 col-md-12 col-lg-3'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-12 show_entries'i><'col-sm-12 col-md-12'p>>",
                    buttons: [
                        { extend: 'copy', className: 'copyButton overallButton' },
                        { extend: 'excel', className: 'excelButton overallButton' },
                        { extend: 'pdf', className: 'pdfButton overallButton' },
                    ],
                    "columns": [
                        { "data": "id", sClass: "main_id"},
                        { "data": "employeeid"},
                        { "data": "username" },
                        { "data": "fullname" },
                        { "data": "created_at" },
                        { "render": function(data, type, row, meta){
                            return `
                                <a href = "#" class = "btn btn-sm btn-outline-primary view_btn"
                                    value = "${row.id}"><i class="fa-solid fa-eye"></i></a>
                                <a href = "#" class = "btn btn-sm btn-outline-success edit_btn" 
                                    value = "${row.id}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href = "#" class = "btn btn-sm btn-outline-danger delete_btn" 
                                    value = "${row.id}"><i class="fa-solid fa-trash-can"></i></a>
                            `;
                            }
                            , "bSortable": false, "aTargets": ["nosort"]
                        }
                    ]
                    
                });
            }
        });
    }
    loademployee();
    
    // CRUD Operation

    // ========== ADD EMPLOYEE RECORDS ========== 
    $(document).on('click','.ajaxemployee-add',function(){

        // ========== Employee ID ==========
        if($.trim($('.employeeid').val()).length == 0){
            error_empid = 'Please enter Employee ID';
            $('#error_empid').text(error_empid);
        }
        else{
            error_empid = '';
            $('#error_empid').text(error_empid);
        }
        // ========== Employee ID ==========

        // ========== Username ==========
        if($.trim($('.username').val()).length == 0){
            error_username = 'Please enter Username';
            $('#error_username').text(error_username);
        }
        else{
            error_username = '';
            $('#error_username').text(error_username);
        }
        // ========== Username ==========

        // ========== Password ==========
        if($.trim($('.password').val()).length == 0){
            error_password = 'Please enter Password';
            $('#error_password').text(error_password);
        }
        else{
            error_password = '';
            $('#error_password').text(error_password);
        }
        // ========== Password ==========

        // ========== FullName ==========
        if($.trim($('.fullname').val()).length == 0){
            error_fullname = 'Please enter Full Name';
            $('#error_fullname').text(error_fullname);
        }
        else{
            error_fullname = '';
            $('#error_fullname').text(error_fullname);
        }
        // ========== FullName ==========

        // ========== User Type ==========
        if($.trim($('.usertype').val()).length == 0){
            error_usertype = 'Please Select An User Type';
            $('#error_usertype').text(error_usertype);
        }
        else{
            error_usertype = '';
            $('#error_usertype').text(error_usertype);
        }
        // ========== User Type ==========

        // ========== User Group ID ==========
        if($.trim($('.usergroup_id').val()).length == 0){
            error_usergroup_id = 'Please enter User Group ID';
            $('#error_usergroup_id').text(error_usergroup_id);
        }
        else{
            error_usergroup_id = '';
            $('#error_usergroup_id').text(error_usergroup_id);
        }
        // ========== User Group ID ==========

        // ========== User Group Name ==========
        if($.trim($('.usergroup_name').val()).length == 0){
            error_usergroup_name = 'Please enter User Group Name';
            $('#error_usergroup_name').text(error_usergroup_name);
        }
        else{
            error_usergroup_name = '';
            $('#error_usergroup_name').text(error_usergroup_name);
        }
        // ========== User Group Name ==========

        // ========== User Group Description ==========
        if($.trim($('.usergroup_descrip').val()).length == 0){
            error_usergroup_descrip = 'Please enter User Group Description';
            $('#error_usergroup_descrip').text(error_usergroup_descrip);
        }
        else{
            error_usergroup_descrip = '';
            $('#error_usergroup_descrip').text(error_usergroup_descrip);
        }
        // ========== User Group Description ==========

        // ========== Contact No ==========
        if($.trim($('.contact_no').val()).length == 0){
            error_contact_no = 'Please enter Password';
            $('#error_contact_no').text(error_contact_no);
        }
        else{
            error_contact_no = '';
            $('#error_contact_no').text(error_contact_no);
        }
        // ========== Contact No ==========

        // ========== Card ID ==========
        if($.trim($('.card_id').val()).length == 0){
            error_card_id = 'Please enter Password';
            $('#error_card_id').text(error_card_id);
        }
        else{
            error_card_id = '';
            $('#error_card_id').text(error_card_id);
        }
        // ========== Card ID ==========

        if(error_empid != '' || error_username != '' || error_password != '' || error_fullname != ''
        || error_usertype != '' || error_usergroup_id != '' || error_usergroup_name != '' 
        || error_usergroup_descrip != ''|| error_contact_no != '' || error_card_id != ''){
            return false;
        }
        else{

            var data = {
                'employeeid' : $('.employeeid').val(),
                'username' : $('.username').val(),
                'password' : $('.password').val(),
                'fullname' : $('.fullname').val(),
                'usertype' : $('.usertype').val(),
                'usergroup_id' : $('.usergroup_id').val(),
                'usergroup_name' : $('.usergroup_name').val(),
                'usergroup_descrip' : $('.usergroup_descrip').val(),
                'contact_no' : $('.contact_no').val(),
                'card_id' : $('.card_id').val(),
            };

            $.ajax({
                method: "POST",
                url: "<?php echo base_url() ?>/valeo/insert",
                data: data,
                success: function(response){
                    if(response.status == "success"){
                        $('#employeeTable').DataTable().destroy();
                        loademployee();
                        $('#employeeModal').modal('hide');
                        $('#employeeModal').find('input').val('');
                        toastr["success"](response.message);
                    }
                    else{
                        $('#employeeModal').modal('hide');
                        $('#employeeModal').find('input').val('');
                        toastr["error"](response.message);
                    }
                }
            });
        }



    });
    // ========== ADD EMPLOYEE RECORDS ========== 

    $(document).on('click','.view_btn',function(){

        var main_id = $(this).attr("value");
        // alert(main_id);

        $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/valeo/viewemployee",
            data: {
                'main_id': main_id,
            },
            success: function(response){
                // console.log(response);
                $.each(response, function(key, empview){
                    // console.log(empview['username']);
                    $('.main_id_view').text(empview['id']);
                    $('.empid_view').text(empview['employeeid']);
                    $('.username_view').text(empview['username']);
                    $('.password_view').text(empview['password']);
                    $('.fullname_view').text(empview['fullname']);
                    $('.usertype_view').text(empview['usertype']);
                    $('.usergroup_id_view').text(empview['usergroup_id']);
                    $('.usergroup_name_view').text(empview['usergroup_name']);
                    $('.usergroup_descrip_view').text(empview['usergroup_descrip']);
                    $('.contact_no_view').text(empview['contact_no']);
                    $('.card_id_view').text(empview['card_id']);

                    $('#EmployeeViewModal').modal('show');
                });
            }
        });
    });

    $(document).on('click','.edit_btn', function(){

        var main_id = $(this).attr("value");

        $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/valeo/edit",
            data: {
                'main_id': main_id,
            },
            success: function(response){
                $.each(response, function(key, empvalue){
                    $('#emp_main_id').val(empvalue['id']);
                    $('#emp_id').val(empvalue['employeeid']);
                    $('#emp_username').val(empvalue['username']);
                    $('#emp_password').val(empvalue['password']);
                    $('#emp_fullname').val(empvalue['fullname']);
                    $('#emp_usertype').val(empvalue['usertype']);
                    $('#emp_usergroup_id').val(empvalue['usergroup_id']);
                    $('#emp_usergroup_name').val(empvalue['usergroup_name']);
                    $('#emp_usergroup_descrip').val(empvalue['usergroup_descrip']);
                    $('#emp_contact_no').val(empvalue['contact_no']);
                    $('#emp_card_id').val(empvalue['card_id']);

                    $('#EmployeeEditModal').modal('show');
                });
            }
        });

    });

    $(document).on('click','.ajaxemployee-update', function(){
        
        var data = {
            'main_id': $('#emp_main_id').val(),
            'employeeid': $('#emp_id').val(),
            'username': $('#emp_username').val(),
            'password': $('#emp_password').val(),
            'fullname': $('#emp_fullname').val(),
            'usertype': $('#emp_usertype').val(),
            'usergroup_id': $('#emp_usergroup_id').val(),
            'usergroup_name': $('#emp_usergroup_name').val(),
            'usergroup_descrip': $('#emp_usergroup_descrip').val(),
            'contact_no': $('#emp_contact_no').val(),
            'card_id': $('#emp_card_id').val(),
        };

        $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/valeo/update",
            data: data,
            success: function(response){
                if(response.status == "success"){
                    $('#employeeTable').DataTable().destroy();
                    loademployee();
                    $('#EmployeeEditModal').modal('hide');
                    toastr["success"](response.message);
                }
                else{
                    $('#EmployeeEditModal').modal('hide');
                    toastr["error"](response.message);
                }
            }
        });
    });

    // $(document).on('click','.delete_btn', function(){

    //     var main_id = $(this).closest('tr').find('.main_id').text();
    //     $('#main_delete_id').val(main_id);
    //     $('#EmployeeDeleteModal').modal('show');
    // });

    $(document).on('click','.delete_btn', function(){

        var del_id = $(this).attr("value");

        // SweetAlert2 js
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success swal_btn_design_confirm',
                cancelButton: 'btn btn-danger swal_btn_design_cancel'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed)
            {
                //Delete AJAX
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url() ?>/valeo/delete",
                    data: {
                        'del_id' : del_id
                    },
                    success: function (response){
                        if(response.status == "success"){
                            $('#employeeTable').DataTable().clear().destroy();
                            loademployee();
                            
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        }
                        else{
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your imaginary file is safe :)',
                                'error'
                            );
                        }
                    }
                });

                
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
                )
            }
        });

    });
    // CRUD Operation

    //usergroup_name
    

</script>


</script>

<?= $this->endSection(); ?>