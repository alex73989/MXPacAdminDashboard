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
                                                        <label for="">Full Name :</label>
                                                        <span id = "error_fullname" class = "text-danger ms-3"></span>
                                                        <input type="text" class="form-control fullname" placeholder="Enter Your Full Name">
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
                                                        Full Name:
                                                        <span class = "fullname_view"></span>
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
                                                        <label for="">Full Name :</label>
                                                        <input type="text" id = "emp_fullname" class="form-control fullname" placeholder="Enter Your Full Name">
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
                        "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
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
                    $('.fullname_view').text(empview['fullname']);
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
                    $('#emp_fullname').val(empvalue['fullname']);
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
            'fullname': $('#emp_fullname').val(),
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
                            $('#employeeTable').DataTable().destroy();
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
        

    $('.dt-buttons').find('span').remove()


// ========== ADD EMPLOYEE RECORDS ========== 

    $(document).on('click','.ajaxemployee-add',function(){

        if($.trim($('.employeeid').val()).length == 0){
            error_empid = 'Please enter Employee ID';
            $('#error_empid').text(error_empid);
        }
        else{
            error_empid = '';
            $('#error_empid').text(error_empid);
        }

        if($.trim($('.username').val()).length == 0){
            error_username = 'Please enter Username';
            $('#error_username').text(error_username);
        }
        else{
            error_username = '';
            $('#error_username').text(error_username);
        }

        if($.trim($('.fullname').val()).length == 0){
            error_fullname = 'Please enter Full Name';
            $('#error_fullname').text(error_fullname);
        }
        else{
            error_fullname = '';
            $('#error_fullname').text(error_fullname);
        }

        if(error_empid != '' || error_username != '' || error_fullname != ''){
            return false;
        }
        else{

            var data = {
                'employeeid' : $('.employeeid').val(),
                'username' : $('.username').val(),
                'fullname' : $('.fullname').val(),
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



</script>

<?= $this->endSection(); ?>