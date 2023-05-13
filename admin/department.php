<?php include('../includes/header.php')?>

<body>
<style>
    .notification {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        padding: 10px;
        margin: 10px;
        border-radius: 4px;
        z-index: 9999;
        background-color: #AFF29A;
        border: 2px solid #35DB00;
        color: #104300;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .notification-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 5px;
        padding-bottom: 5px;
        border-bottom: 1px solid #35DB00;
    }

    .notification-icon {
        margin-right: 10px;
        font-size: 18px;
        line-height: 20px;
        text-align: center;
        width: 20px;
    }

    .notification-title {
        margin: 0;
        font-size: 16px;
    }

    .notification-message {
        margin-top: 5px;
        padding: 10px 0;
    }

    .swal2-container {
      z-index: 99999;
    }

    .notification-close {
        border: none;
        background-color: transparent;
        font-size: 18px;
        line-height: 20px;
        color: #0a0a0a;
        cursor: pointer;
    }

    .notification-close:hover {
        color: #0a0a0a;
    }
</style>

<div style="display: none; width: 270px; right: 36px; top: 36px;" id="notification" class="notification success">
    <div class="notification-header">
        <div class="notification-icon"><i class="icofont icofont-info-circle"></i></div>
        <h4 class="notification-title">Success</h4>
        <button class="notification-close"><i class="icofont icofont-close-circled"></i></button>
    </div>
    <div class="notification-message">Success message goes here.</div>
</div>


<!-- Pre-loader start -->
<?php include('../includes/loader.php')?>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <?php include('../includes/topbar.php')?>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                
               <?php $page_name = "department"; ?>
                <?php include('../includes/sidebar.php')?>

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
              
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline"  id="pnotify-desktop-success">
                                                    <h4>Department List</h4>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Product list card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add Product
                                                        </button>
                                                    </div>
                                                    <div class="tab-content">
                                                    <!-- tab pane contact start -->
                                                        <div class="tab-pane active" id="contacts" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <!-- contact data table card start -->
                                                                            <div class="card">
                                                                                <div class="card-block contact-details">
                                                                                    <div class="data_table_main table-responsive dt-responsive">
                                                                                        <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Name</th>
                                                                                                <th>Description</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $sql = "SELECT * FROM departments";
                                                                                            $result = mysqli_query($conn, $sql);
                                                                                            if (mysqli_num_rows($result) > 0) {
                                                                                                $count = 1;
                                                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $count; ?></td>
                                                                                                        <td><?php echo $row['name']; ?></td>
                                                                                                        <td><?php echo $row['description']; ?></td>
                                                                                                        <td class="action-icon">
                                                                                                            <a href="#" data-modal="modal-13" class="m-r-15 text-muted edit-btn md-trigger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-description="<?php echo $row['description']; ?>">
                                                                                                            <i class="icofont icofont-ui-edit"></i></a>
                                                                                                            <a href="#" class="delete-btn text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" data-id="<?php echo $row['id']; ?>"><i class="icofont icofont-ui-delete"></i></a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <?php
                                                                                                    $count++;
                                                                                                }
                                                                                            } else {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-center">
                                                                                                        <img src="..\files\assets\images\no_data.png" class="img-radius" alt="No Data Found" style="width: 200px; height: auto;">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </tbody>

                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- contact data table card end -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product list card end -->
                                            </div>
                                        </div>
                                        <!-- Add Contact Start Model start-->
                                           <div class="md-modal md-effect-13 addcontact" id="modal-13">
                                                <div class="md-content" style="max-width: 400px;">
                                                    <h3 class="f-26">Add Department</h3>
                                                    <div >
                                                         <input hidden type="text" class="form-control department-id" name="department-id">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icofont icofont-bank-alt"></i></span>
                                                            <input type="text" class="form-control dname" name="dname" placeholder="Department Name">
                                                        </div>
                                                        <div class="input-group">
                                                            <textarea class="form-control description" name="description" placeholder="Description here" spellcheck="false" rows="5"></textarea>
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <button type="submit"  id="save-btn" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn">Save</button>
                                                            <button type="submit" id="update-btn" class="btn btn-primary waves-effect m-r-20 f-w-600 update_btn" style="display:none;">Update</button>
                                                            <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                                                        </div>
                                                    </div>
                                               </div>
                                          </div>
                                        <div class="md-overlay"></div>
                                        <!-- Add Contact Ends Model end-->
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <?php include('../includes/scripts.php')?>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script type="text/javascript">
        $('#save-btn').click(function(event){
            event.preventDefault(); // prevent the default form submission
            (async () => {
                var data = {
                    dname: $('.dname').val(),
                    description: $('.description').val(), 
                    action: "save",
                };
                if (data.dname.trim() === '' || data.description.trim() === '') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please all fieds are required. Kindly fill all',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                $.ajax({
                    url: 'department_functions.php',
                    type: 'post',
                    data: data,
                    success:function(response){
                        response = JSON.parse(response);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Inserted Successfully',
                                html:
                                'Name : ' + data['dname'],
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('.md-close').trigger('click'); // close the modal form
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                                confirmButtonColor: '#eb3422',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            })()
        })
    </script>
    <script type="text/javascript">
       // Get the edit button and listen for click events
        $('.edit-btn').click(function() {
            // Get the values of the data attributes from the clicked edit button
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            
            // Set the values of the input fields in the modal form
            $('#modal-13 .department-id').val(id);
            $('#modal-13 .dname').val(name);
            $('#modal-13 .description').val(description);
            
            // Show the modal form
            $('.md-modal[data-modal="modal-13"]').addClass('md-show');

            $('#save-btn').removeClass('d-inline-block').hide();
            $('#update-btn').addClass('d-inline-block').show();

        });

        $('#update-btn').click(function(event){
            event.preventDefault(); // prevent the default form submission
            (async () => {
                var data = {
                    id: $('.department-id').val(),
                    dname: $('.dname').val(),
                    description: $('.description').val(),
                    action: "update",
                };
                if (data.dname.trim() === '' || data.description.trim() === '') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please all fieds are required. Kindly fill all',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                $.ajax({
                    url: 'department_functions.php',
                    type: 'post',
                    data: data,
                    success:function(response){
                        response = JSON.parse(response);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated Successfully',
                                html:
                                'Name : ' + data['dname'],
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('.md-close').trigger('click'); // close the modal form
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                                confirmButtonColor: '#eb3422',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            })()
        })
    </script>
    <script type="text/javascript">
        $('.delete-btn').click(function(){
        (async () => {
            const { value: formValues } = await Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })

            if (formValues) {
            var data = {
                id: $(this).data("id"),
                action: "delete"
            };

            $.ajax({
                url: 'department_functions.php',
                type: 'post',
                data: data,
                success: function(response) {
                    const responseObject = JSON.parse(response);
                    console.log(`RESPONSE HERE: ${responseObject.status}`);
                    if (response && responseObject.status === 'success') {
                        // Show success message
                        Swal.fire(
                            'Deleted!',
                            'Department has been deleted.',
                            'success'
                        ).then((result) => {
                                if (result.isConfirmed) {
                                   
                                    location.reload();
                                }
                        });
                        
                    } else {
                        // Show error message
                        Swal.fire(
                            'Error!',
                            'Failed to delete department.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log("AJAX error: " + error);
                    Swal.fire('Error!', 'Failed to delete department.', 'error');
                }

            });
          }
        })()
    })
    </script>

</body>

</html>
