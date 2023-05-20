<?php include('../includes/header.php')?>
<?php include('../includes/utils.php')?>
<body>
    <Style>
        .faq-progress .progress {
            height: 8px;
            background-color: #e8e8e8;
            border-radius: 50px;
            overflow: hidden;
        }

        .faq-progress .faq-test3 {
            height: 10px;
            border-radius: 50px;
            transition: width 0.5s ease-in-out;
        }
        .faq-bar-highest {
            background-color: #eb3422;
        }

        .faq-bar-high {
            background-color: #fe9365;
        }

        .faq-bar-normal {
            background-color: #0ac282;
        }

        .faq-bar-low {
            background-color: #01a9ac;
        }

    </Style>
<!-- Pre-loader start -->
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <?php include('../includes/topbar.php')?>

        <!-- Sidebar inner chat end-->
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
                                                    <h4>Ticket List</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- Right column start -->
                                            <div class="col-xl-3 col-lg-12 push-xl-9">
                                                <!-- Search box card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-header-text">Search Box</h5>
                                                    </div>
                                                    <div class="card-block p-t-10">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search here...">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-search"></i></span>
                                                        </div>
                                                        <div class="task-right">
                                                            <div class="task-right-header-status">
                                                                <span data-toggle="collapse">Ticket Status</span>
                                                                <i class="icofont icofont-rounded-down f-right"></i>
                                                            </div>
                                                            <!-- end of sidebar-header completed status-->
                                                            <div class="taskboard-right-progress">
                                                                <h6>Highest Priority</h6>
                                                                <div class="faq-progress">
                                                                    <div class="progress">
                                                                        <!-- <span class="faq-text3"></span> -->
                                                                        <div class="faq-test3 faq-bar-highest" style="width: 80%;"></div>
                                                                    </div>
                                                                </div>
                                                                <h6>High Priority</h6>
                                                                <div class="faq-progress">
                                                                    <div class="progress">
                                                                        <!-- <span class="faq-text1"></span> -->
                                                                        <div class="faq-test3 faq-bar-high" style="width: 70%;"></div>
                                                                    </div>
                                                                </div>
                                                                <h6>Normal Priority</h6>
                                                                <div class="faq-progress">
                                                                    <div class="progress">
                                                                        <!-- <span class="faq-text2"></span> -->
                                                                        <div class="faq-test3 faq-bar-normal" style="width: 50%;"></div>
                                                                    </div>
                                                                </div>
                                                                <h6>Low Priority</h6>
                                                                <div class="faq-progress">
                                                                    <div class="progress">
                                                                        <!-- <span class="faq-text4"></span> -->
                                                                        <div class="faq-test3 faq-bar-low" style="width: 60%;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end of task-board-right progress -->
                                                            <!-- start task right users -->
                                                            <div class="task-right-header-users">
                                                                <span data-toggle="collapse">Department With Ticket</span>
                                                                <i class="icofont icofont-rounded-down f-right"></i>
                                                            </div>
                                                            <div class="user-box assign-user taskboard-right-users">
                                                                <?php
                                                                $query = "SELECT d.id, d.name, COUNT(t.id) AS ticket_count
                                                                    FROM departments d
                                                                    LEFT JOIN tickets t ON t.department_id = d.id
                                                                    GROUP BY d.id
                                                                    HAVING ticket_count > 0";

                                                                $result = mysqli_query($conn, $query);

                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $department_id = $row['id'];
                                                                    $department_name = $row['name'];
                                                                    $ticket_count = $row['ticket_count'];
                                                                    
                                                                    echo '<div class="user-box assign-user taskboard-right-users">';
                                                                    echo '<div class="media" style="margin: 5px;">';
                                                                    echo '<div class="media-left">';
                                                                    echo '<a class="btn btn-outline-primary btn-lg txt-muted btn-icon" href="#!" role="button"><i class="icofont icofont-architecture-alt"></i></a>';
                                                                    echo '</div>';
                                                                    echo '<div class="media-body">';
                                                                    echo '<div class="chat-header" style="margin-top: 5px;">' . $department_name . '</div>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                }
                                                                ?>
                                                            </div>
                                                            <!-- end of task-board-right users -->
                                                            <div class="task-right-header-revision">
                                                                <span data-toggle="collapse">Comments</span>
                                                                <i class="icofont icofont-rounded-down f-right"></i>
                                                            </div>
                                                            <div class="taskboard-right-revision user-box">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <div class="chat-header">Drop the IE specific hacks for temporal inputs</div>
                                                                        <p class="chat-header  text-muted">4 minutes ago</p>
                                                                    </div>
                                                                    <!-- end of media body -->
                                                                </div>
                                                            </div>
                                                            <!-- end of task-right-revision -->
                                                        </div>
                                                        <!-- end of sidebar-right -->
                                                    </div>
                                                    <!-- end of card-block -->
                                                </div>
                                                <!-- Search box card end -->
                                            </div>
                                            <!-- Right column end -->
                                            <!-- Left column start -->
                                            <div class="col-xl-9 col-lg-12 pull-xl-3 filter-bar">
                                                <!-- Nav Filter tab start -->
                                              <?php
                                                $status = isset($_GET['status']) ? $_GET['status'] : null;
                                                $timeRange = isset($_GET['timeRange']) ? $_GET['timeRange'] : null;

                                                $query = "SELECT t.id, t.subject, t.description, t.status, t.priority, t.date_created, c.firstname, c.lastname, d.name
                                                        FROM tickets t
                                                        JOIN customers c ON t.customer_id = c.id
                                                        JOIN departments d ON t.department_id = d.id ";

                                                $where = "";
                                                if (isset($timeRange)) {
                                                    switch ($timeRange) {
                                                        case 'today':
                                                            $where = " WHERE DATE(t.date_created) = CURDATE()";
                                                            break;
                                                        case 'yesterday':
                                                            $where = " WHERE DATE(t.date_created) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                                                            break;
                                                        case 'this-week':
                                                            $where = " WHERE WEEK(t.date_created) = WEEK(NOW()) AND YEAR(t.date_created) = YEAR(NOW())";
                                                            break;
                                                        case 'this-month':
                                                            $where = " WHERE MONTH(t.date_created) = MONTH(NOW()) AND YEAR(t.date_created) = YEAR(NOW())";
                                                            break;
                                                        case 'this-year':
                                                            $where = " WHERE YEAR(t.date_created) = YEAR(NOW())";
                                                            break;
                                                        default:
                                                            $where = "";
                                                            break;
                                                    }
                                                }
                                                if ($status !== null) {
                                                    switch ($status) {
                                                        case 'open':
                                                            $statusWhere = "(t.status = 0)";
                                                            break;
                                                        case 'processing':
                                                            $statusWhere = "(t.status = 1)";
                                                            break;
                                                        case 'resolved':
                                                            $statusWhere = "(t.status = 2)";
                                                            break;
                                                        case 'closed':
                                                            $statusWhere = "(t.status = 3)";
                                                            break;
                                                        default:
                                                            $statusWhere = "";
                                                            break;
                                                    }
                                                    if ($statusWhere) {
                                                        if ($where) {
                                                            $where .= " AND " . $statusWhere;
                                                        } else {
                                                            $where = "WHERE " . $statusWhere;
                                                        }
                                                    }
                                                }
                                                
                                                $query .= $where;
                                                $query .= " ORDER BY t.date_created DESC";
                                                $stmt = mysqli_prepare($conn, $query);
                                                if (!$stmt) {
                                                    die('Error preparing statement: ' . mysqli_error($conn));
                                                }
                                                $result = mysqli_stmt_execute($stmt);
                                                if (!$result) {
                                                    die('Error executing statement: ' . mysqli_stmt_error($stmt));
                                                }
                                                mysqli_stmt_bind_result($stmt, $id, $subject, $description, $status, $priority, $date_created, $firstname, $lastname, $department_name);
                                                $results = [];
                                                while (mysqli_stmt_fetch($stmt)) {
                                                    $result = [
                                                        'id' => $id,
                                                        'subject' => $subject,
                                                        'description' => $description,
                                                        'status' => $status,
                                                        'priority' => $priority,
                                                        'date_created' => $date_created,
                                                        'customer_name' => $firstname . ' ' . $lastname,
                                                        'department_name' => $department_name
                                                    ];
                                                    
                                                    // Calculate time ago
                                                    $due_label = calculate_time_ago($date_created);
                                                    $result['due_label'] = $due_label;
                                                    $results[] = $result;
                                                }
                                                mysqli_stmt_close($stmt);
                                              ?>

                                                <nav class="navbar navbar-light bg-faded m-b-30 p-10">
                                                    <ul class="nav navbar-nav">
                                                        <li class="nav-item active">
                                                            <a class="nav-link" href="#!">Filter: <span class="sr-only">(current)</span></a>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#!" id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-clock-time"></i> By Date</a>
                                                            <div class="dropdown-menu" aria-labelledby="bydate">
                                                                <?php if (!$timeRange): ?>
                                                                    <a class="dropdown-item active" href="#">Show all</a>
                                                                <?php else: ?>
                                                                    <a class="dropdown-item <?php echo (!$timeRange) ? 'active' : ''; ?>" href="?">Show all</a>
                                                                <?php endif; ?>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item <?php echo $timeRange === 'today' ? 'active' : ''; ?>" href="?timeRange=today">Today</a>
                                                                <a class="dropdown-item <?php echo $timeRange === 'yesterday' ? 'active' : ''; ?>" href="?timeRange=yesterday">Yesterday</a>
                                                                <a class="dropdown-item <?php echo $timeRange === 'this-week' ? 'active' : ''; ?>" href="?timeRange=this-week">This week</a>
                                                                <a class="dropdown-item <?php echo $timeRange === 'this-month' ? 'active' : ''; ?>" href="?timeRange=this-month">This month</a>
                                                                <a class="dropdown-item <?php echo $timeRange === 'this-year' ? 'active' : ''; ?>" href="?timeRange=this-year">This year</a>
                                                            </div>
                                                        </li>
                                                        <!-- end of by date dropdown -->
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#!" id="bystatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-chart-histogram-alt"></i> By Status</a>
                                                            <div class="dropdown-menu" aria-labelledby="bystatus">
                                                                <a class="dropdown-item <?php echo !isset($_GET['status']) ? 'active' : ''; ?>" href="?">Show all</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item <?php echo isset($_GET['status']) && $_GET['status'] === 'open' ? 'active' : ''; ?>" href="?status=open">Open</a>
                                                                <a class="dropdown-item <?php echo isset($_GET['status']) && $_GET['status'] === 'processing' ? 'active' : ''; ?>" href="?status=processing">Processing</a>
                                                                <a class="dropdown-item <?php echo isset($_GET['status']) && $_GET['status'] === 'resolved' ? 'active' : ''; ?>" href="?status=resolved">Resolved</a>
                                                                <a class="dropdown-item <?php echo isset($_GET['status']) && $_GET['status'] === 'closed' ? 'active' : ''; ?>" href="?status=closed">Closed</a>
                                                            </div>
                                                        </li>
                                                        <!-- end of by status dropdown -->
                                                    </ul>
                                                    <div class="nav-item nav-grid">
                                                        <span class="m-r-15">View Mode: </span>
                                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" data-placement="top" title="list view">
                                                            <i class="icofont icofont-listine-dots"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="grid view">
                                                            <i class="icofont icofont-table"></i>
                                                        </button>
                                                    </div>
                                                    <!-- end of by priority dropdown -->

                                                </nav>
                                                <!-- Nav Filter tab end -->
                                                <!-- Task board design block start-->
                                                <div class="row">
                                                <?php foreach ($results as $result){ ?>
                                                    <div class="col-sm-6">
                                                        <?php
                                                        // Assign color class based on priority
                                                        $color_class = '';
                                                        switch ($result['priority']) {
                                                            case 'Highest':
                                                                $color_class = 'card-border-danger';
                                                                break;
                                                            case 'High':
                                                                $color_class = 'card-border-warning';
                                                                break;
                                                            case 'Normal':
                                                                $color_class = 'card-border-success';
                                                                break;
                                                            case 'Low':
                                                                $color_class = 'card-border-primary';
                                                                break;
                                                            default:
                                                                $color_class = 'card-border-primary';
                                                        }
                                                        ?>
                                                        <div class="card <?php echo $color_class; ?>">
                                                            <div class="card-header">
                                                                <a href="#" class="card-title">#<?php echo $result['id']; ?>. <?php echo $result['subject']; ?> </a>
                                                                <span class="label label-primary f-right"><?php echo date('d F, Y', strtotime($result['date_created'])); ?> </span>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <p class="task-detail">
                                                                            <?php
                                                                            $description = htmlspecialchars_decode($result['description']);
                                                                            $description = strip_tags($description);
                                                                            $description = substr($description, 0, 250);
                                                                            echo $description . (strlen($result['description']) > 250 ? '...' : '');
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                    <!-- end of col-sm-8 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="task-list-table">
                                                                     <p class="task-due" style="margin-top: 10px;"><strong> Due : </strong><?php echo $result['due_label']; ?></p>
                                                                </div>
                                                                <div class="task-board">
                                                                    <div class="dropdown-secondary dropdown">
                                                                        <button id="priority-dropdown" class="btn btn-primary btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <?php echo $result['priority']; ?>
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'Highest' ? 'active' : ''; ?>" href="#!" data-priority="Highest" data-ticket-id="<?php echo $result['id']; ?>"><span class="point-marker bg-danger"></span>Highest priority</a>
                                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'High' ? 'active' : ''; ?>" href="#!" data-priority="High" data-ticket-id="<?php echo $result['id']; ?>"><span class="point-marker bg-warning"></span>High priority</a>
                                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'Normal' ? 'active' : ''; ?>" href="#!" data-priority="Normal" data-ticket-id="<?php echo $result['id']; ?>"><span class="point-marker bg-success"></span>Normal priority</a>
                                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'Low' ? 'active' : ''; ?>" href="#!" data-priority="Low" data-ticket-id="<?php echo $result['id']; ?>"><span class="point-marker bg-info"></span>Low priority</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-secondary dropdown">
                                                                        <button id="status-dropdown" class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <?php echo $result['status'] == 0 ? 'Open' : ($result['status'] == 1 ? 'Processing' : ($result['status'] == 2 ? 'Resolved' : 'Closed')); ?>
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdown2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == 0 ? 'active' : ''; ?>" href="#!" data-status="0" data-ticket-id="<?php echo $result['id']; ?>">Open</a>
                                                                            <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == 1 ? 'active' : ''; ?>" href="#!" data-status="1" data-ticket-id="<?php echo $result['id']; ?>">Processing</a>
                                                                            <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == 2 ? 'active' : ''; ?>" href="#!" data-status="2" data-ticket-id="<?php echo $result['id']; ?>">Resolved</a>
                                                                            <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == 3 ? 'active' : ''; ?>" href="#!" data-status="3" data-ticket-id="<?php echo $result['id']; ?>">Closed</a>
                                                                        </div>
                                                                        <!-- end of dropdown menu -->
                                                                    </div>
                                                                    <!-- end of dropdown-secondary -->
                                                                    <div class="dropdown-secondary dropdown">
                                                                        <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item waves-light waves-effect" href="new_ticket.php?id=<?php echo $result['id']; ?>&edit=1"><i class="icofont icofont-ui-edit"></i> Edit Ticket</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item waves-light waves-effect" href="ticket_details.php?id=<?php echo $result['id']; ?>&edit=1"><i class="icofont icofont-spinner-alt-5"></i> View Ticket</a>
                                                                            <a class="remove-ticket dropdown-item waves-light waves-effect" href="#!" data-ticket-id="<?php echo $result['id']; ?>"><i class="icofont icofont-close-line"></i> Remove</a>
                                                                        </div>
                                                                        <!-- end of dropdown menu -->
                                                                    </div>
                                                                    <!-- end of seconadary -->
                                                                </div>
                                                                <!-- end of pull-right class -->
                                                            </div>
                                                            <!-- end of card-footer -->
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- Task board design block end -->
                                            </div>
                                            <!-- Left column end -->
                                        </div>
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
    <?php
        // Query database for count of each priority level
        $query = "SELECT
            SUM(CASE WHEN priority = 'Highest' THEN 1 ELSE 0 END) AS highest_count,
            SUM(CASE WHEN priority = 'High' THEN 1 ELSE 0 END) AS high_count,
            SUM(CASE WHEN priority = 'Normal' THEN 1 ELSE 0 END) AS normal_count,
            SUM(CASE WHEN priority = 'Low' THEN 1 ELSE 0 END) AS low_count
          FROM tickets";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $highest_count = $row['highest_count'];
        $high_count = $row['high_count'];
        $normal_count = $row['normal_count'];
        $low_count = $row['low_count'];

        $total_count = $highest_count + $high_count + $normal_count + $low_count;

        // Calculate percentage width for each loader bar
        $highest_width = ($highest_count / $total_count) * 100;
        $high_width = ($high_count / $total_count) * 100;
        $normal_width = ($normal_count / $total_count) * 100;
        $low_width = ($low_count / $total_count) * 100;
    ?>
    
    <?php include('../includes/scripts.php')?>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script>
        setTimeout(function() {
            // Set width of each loader bar
            var highest_progress = document.querySelector('.faq-bar-highest');
            highest_progress.style.width = '<?php echo $highest_width; ?>%';

            var high_progress = document.querySelector('.faq-bar-high');
            high_progress.style.width = '<?php echo $high_width; ?>%';

            var normal_progress = document.querySelector('.faq-bar-normal');
            normal_progress.style.width = '<?php echo $normal_width; ?>%';

            var low_progress = document.querySelector('.faq-bar-low');
            low_progress.style.width = '<?php echo $low_width; ?>%';
        }, 1000); // 1000ms = 1 second delay
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.dropdown-priority', function(event) {
                console.log('Dropdown item clicked');
                event.preventDefault();
                (async () => {
                    const { value: formValues } = await Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to update this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!'
                    });

                    var selectedPriority = $(this).data('priority');
                    $('#priority-dropdown').html(selectedPriority);
                    var ticketId = $(this).data('ticket-id');

                    console.log('ticket_id:', ticketId); 

                    if (formValues) {
                        var data = {
                            id: ticketId,
                            priority: selectedPriority,
                            action: "update-ticket-priority"
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
                    var ticketId = $(this).data('ticket-id');

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
                
                var ticketId = $(this).data('ticket-id');

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
        })
    </script>

</body>

</html>
