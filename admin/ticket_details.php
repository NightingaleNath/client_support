<?php include('../includes/header.php')?>
<?php include('../includes/utils.php')?>
<body>
<!-- Pre-loader start -->
 <?php include('../includes/loader.php')?>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <?php include('../includes/topbar.php')?>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                
                <?php $page_name = "ticket_list"; ?>
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
                                                <div class="d-inline">
                                                    <h4>Ticket detail</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    
                                    <?php
                                        // Check if the edit parameter is set and fetch the record from the database
                                        if(isset($_GET['edit']) && $_GET['edit'] == 1 && isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $stmt = mysqli_prepare($conn, "SELECT * FROM tickets WHERE id = ?");
                                            mysqli_stmt_bind_param($stmt, "i", $id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            $row = mysqli_fetch_assoc($result);
                                        }
                                    ?>

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- Task-detail-right start -->
                                             <div class="col-xl-4 col-lg-12 push-xl-8 task-detail-right">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Task Details</h5>
                                                    </div>
                                                    <div class="card-block task-details">
                                                        <table class="table table-border table-xs">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reported By:</td>
                                                                     <td class="text-right">
                                                                        <?php
                                                                            if (isset($row['customer_id'])) {
                                                                                $customer_id = $row['customer_id'];
                                                                                
                                                                                // Fetch customer details from the customers table
                                                                                $stmt = mysqli_prepare($conn, "SELECT * FROM customers WHERE id = ?");
                                                                                mysqli_stmt_bind_param($stmt, "i", $customer_id);
                                                                                mysqli_stmt_execute($stmt);
                                                                                $result = mysqli_stmt_get_result($stmt);
                                                                                $customer = mysqli_fetch_assoc($result);
                                                                                
                                                                                if ($customer) {
                                                                                    $first_name = $customer['firstname'];
                                                                                    $middle_name = $customer['middlename'];
                                                                                    $last_name = $customer['lastname'];
                                                                                    
                                                                                    $full_name = $first_name;
                                                                                    if ($middle_name) {
                                                                                        $full_name .= ' ' . $middle_name;
                                                                                    }
                                                                                    $full_name .= ' ' . $last_name;
                                                                                    
                                                                                    echo '<a href="#">' . $full_name . '</a>';
                                                                                } else {
                                                                                    echo 'Unknown Customer';
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Reported To:</td>
                                                                    <td class="text-right">
                                                                        <?php
                                                                            if (isset($row['department_id'])) {
                                                                                $department_id = $row['department_id'];

                                                                                // Fetch department name from the departments table
                                                                                $stmt = mysqli_prepare($conn, "SELECT name FROM departments WHERE id = ?");
                                                                                mysqli_stmt_bind_param($stmt, "i", $department_id);
                                                                                mysqli_stmt_execute($stmt);
                                                                                $result = mysqli_stmt_get_result($stmt);
                                                                                $department = mysqli_fetch_assoc($result);

                                                                                if ($department) {
                                                                                    $department_name = $department['name'];
                                                                                    echo $department_name;
                                                                                } else {
                                                                                    echo 'Unknown Department';
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Created:</td>
                                                                    <td class="text-right"><?php echo isset($row['date_created']) ? date('d F, Y', strtotime($row['date_created'])) : ''; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Priority:</td>
                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="#"><?php echo isset($row['priority']) ? $row['priority'] : ''; ?> priority</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Status:</td>
                                                                    <td class="text-right">
                                                                        <?php
                                                                            if (isset($row['status'])) {
                                                                                $status = $row['status'];
                                                                                if ($status == 0) {
                                                                                    echo 'Open';
                                                                                } elseif ($status == 1) {
                                                                                    echo 'Processing';
                                                                                } elseif ($status == 2) {
                                                                                    echo 'Resolved';
                                                                                } else {
                                                                                    echo 'Closed';
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div>
                                                            <div class="dropdown-secondary dropdown d-inline-block">
                                                                <button class="btn btn-sm btn-primary dropdown-toggle waves-light" type="button" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                    <a class="dropdown-item waves-light waves-effect" href="new_ticket.php?id=<?= $id ?>&edit=1"><i class="icofont icofont-edit-alt m-r-10"></i>Edit task</a>
                                                                    <a class="remove-ticket dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-close m-r-10"></i>Remove</a>
                                                                </div>
                                                                <!-- end of dropdown menu -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-8 col-lg-12 pull-xl-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><i class="icofont icofont-tasks-alt m-r-5"></i> <?php echo isset($row['subject']) ? $row['subject'] : ''; ?></h5>
                                                        <div class="f-right">
                                                            <div class="dropdown-secondary dropdown">
                                                                <button id="status-dropdown" class="btn btn-sm btn-primary dropdown-toggle waves-light" type="button" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <?php echo $row['status'] == 0 ? 'Open' : ($row['status'] == 1 ? 'Processing' : ($row['status'] == 2 ? 'Resolved' : 'Closed')); ?>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                    <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $row['status'] == 0 ? 'active' : ''; ?>" href="#!" data-status="0">Open</a>
                                                                    <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $row['status'] == 1 ? 'active' : ''; ?>" href="#!" data-status="1">Processing</a>
                                                                    <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $row['status'] == 2 ? 'active' : ''; ?>" href="#!" data-status="2">Resolved</a>
                                                                    <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $row['status'] == 3 ? 'active' : ''; ?>" href="#!" data-status="3">Closed</a>
                                                                </div>
                                                                <!-- end of dropdown menu -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="">
                                                            <div class="m-b-20">
                                                                <h6 class="sub-title m-b-5"></h6>
                                                                <p>
                                                                    <?php echo isset($row['description']) ? html_entity_decode($row['description']) : ''; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
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

    <?php include('../includes/scripts.php')?>
    <!-- counter js -->
    <script src="..\files\bower_components\countdown\js\jquery.countdown.js"></script>
    <script src="..\files\assets\pages\counter\task-detail.js"></script>
    <!-- Switch component js -->
    <script type="text/javascript" src="..\files\bower_components\switchery\js\switchery.min.js"></script>

    <script>
        // Multiple swithces
        var elem = Array.prototype.slice.call(document.querySelectorAll('.js-small'));

        elem.forEach(function(html) {
            var switchery = new Switchery(html, {
                color: '#1abc9c',
                jackColor: '#fff',
                size: 'small'
            });
        });

    </script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.dropdown-status', function(event) {
                console.log('Dropdown item clicked');
                event.preventDefault();
                (async () => {
                    const { value: formValues } = await Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to update this status!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!'
                    });

                    var selectedStatus = $(this).data('status');
                    $('#status-dropdown').html(selectedStatus);

                    var ticketId = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;

                    console.log('ticket_id:', ticketId); 

                    if (formValues) {
                        var data = {
                            id: ticketId,
                            status: selectedStatus,
                            action: "update-ticket-status"
                        };

                        console.log('Data HERE: ' + JSON.stringify(data));
                        $.ajax({
                            url: 'ticket_functions.php',
                            type: 'post',
                            data: data,
                            success: function(response) {
                                const responseObject = JSON.parse(response);
                                console.log(`RESPONSE: ${response}`);
                                console.log(`RESPONSE HERE: ${responseObject}`);
                                console.log(`RESPONSE HERE: ${responseObject.message}`);
                                if (response && responseObject.status === 'success') {
                                    // Show success message
                                    Swal.fire({
                                        icon: 'success',
                                        html: responseObject.message,
                                        confirmButtonColor: '#01a9ac',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                    
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        text: responseObject.message,
                                        confirmButtonColor: '#eb3422',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("AJAX error: " + error);
                                console.log('Data HERE: ' + JSON.stringify(data));
                                Swal.fire('Error!', 'Failed to delete department.', 'error');
                            }

                        });
                    }
                    
                })()
            });
        });
    </script>
    <script type="text/javascript">
        $('.remove-ticket').click(function(){
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
                
                var ticketId = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;

                console.log('ticket_id:', ticketId); 

                if (formValues) {
                var data = {
                    id: ticketId,
                    action: "remove-ticket"
                };
                console.log('Data HERE: ' + JSON.stringify(data));
                $.ajax({
                    url: 'ticket_functions.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        const responseObject = JSON.parse(response);
                        console.log(`RESPONSE: ${response}`);
                        console.log(`RESPONSE HERE: ${responseObject}`);
                        console.log(`RESPONSE HERE: ${responseObject.message}`);
                        if (response && responseObject.status === 'success') {
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                html: responseObject.message,
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "ticket_list.php";
                                }
                            });
                            
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: responseObject.message,
                                confirmButtonColor: '#eb3422',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX error: " + error);
                        console.log('Data HERE: ' + JSON.stringify(data));
                        Swal.fire('Error!', 'Failed to delete department.', 'error');
                    }

                });
            }
            })()
        })
    </script>
    

</body>

</html>
