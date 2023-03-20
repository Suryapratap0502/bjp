<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Datatable1').DataTable();
    });
</script>
<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Nagar Palika</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Nagar Palika</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Nagar Palika</h4>
                            <div class="flex-shrink-0">
                                <?php if ($this->rbac->hasPrivilege('nagar_palika', 'can_add')) { ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
                                <?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Nagar Palika</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>
                                        </div>
                                        <form method="POST" id="addSubadmin">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Nagar Palika Name</label>
                                                        <input type="text" class="form-control" name="pan_sam_name" id="pan_sam_name" placeholder="Enter Nagar Palika">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <input type="hidden" class="form-control" name="panchayat" id="panchayat" value="2">
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nagar Palika</th>
                                                
                                                <th scope="col" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($nagarpalika as $row) {
                                            ?>
                                                <tr id="delete">
                                                    <td><a href="#" class="fw-medium"><?php echo $i; ?></a></td>
                                                    <td> <?php echo $row['pachayatsimiti']; ?></td>
                                                   <?php if($this->rbac->hasPrivilege('panchayat_samiti','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>
                                                  <?php if($this->rbac->hasPrivilege('panchayat_samiti','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                                 
                                                   
                                                   
                                                    
                                                  
                                                </tr>
                                               
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepassword">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="changepassword" id="changepasswordsubadmin">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label" for="password-input">Current Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="password-input">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Supervisor Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/footer.php'); ?>
</div>
<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
<!--Swiper slider js-->
<script src="assets/libs/swiper/swiper-bundle.min.js"></script>
<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-ecommerce.init.js"></script>
<!-- App js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Nagar Palika Record ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>nagarpalika/delete/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                        },
                        error: function() {
                            swal('Record Not Deleted ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }
            });
    }
</script>
<script type="text/javascript">
    function holdModal(exampleModalgrid) {
        $('#' + exampleModalgrid).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addSubadmin', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var panchayatsamiti = $('#pan_sam_name').val();
       
        if (panchayatsamiti == '') {
            $('#subnameError').html('Enter Panchayat Samiti Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
       
      
      
        if (error == false) {
            $.ajax({
                url: "<?= base_url('nagarpalika/addnagarpalika'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Nagar Palika Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.done == '0') {
                        swal('Nagar Palika Not Added ☹️', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.email == '0') {
                        swal('Nagar Palika Already Exist ☹️', ' ', 'error');
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            })
        }
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editmodel').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: "<?= base_url('nagarpalika/nagarpalikaedit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('.bannerData').modal('show');
                }
            })
        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#bannerModelSubmits', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>nagarpalika/updatenagarpalika/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data
                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Record Updated 🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                } else {
                }
                // if (dataResult.inserted == '1') {
                //     $('#success').html("Category Added Succefully!");
                //     $('#success').css('color', 'green');
                // }
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
</script>
<script type="text/javascript">
    function enableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable supervisor Account "+admin_email,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Enable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Supervisor/update/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);
                        },
                        error: function() {
                            swal('Account Still Disable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }
            });
    }
</script>
<script type="text/javascript">
    function disableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable supervisor Account "+admin_email,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Supervisor/updatedisable/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);
                        },
                        error: function() {
                            swal('Account Still Enable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }
            });
    }
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#changepasswordsubadmin', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Supervisor/changesubpass",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data
                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Password Changed 🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
                if (dataResult.inserted == '0') {
                    swal('Password Not Changed ☹️', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
                if (dataResult.password == '0') {
                    swal('Current Password Mismatch ☹️', ' ', 'error');
                }
                // if (dataResult.inserted == '1') {
                //     $('#success').html("Category Added Succefully!");
                //     $('#success').css('color', 'green');
                // }
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
   
    
</script>
<!-- filter Data -->
</body>
</html>