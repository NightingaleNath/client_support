
<?php include('../includes/header.php')?>
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
                    <?php $page_name = "dashboard"; ?>
                    <?php include('../includes/sidebar.php')?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- user card  start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card user-widget-card bg-c-blue">
                                                    <div class="card-block">
                                                         <?php
                                                            $stmt = $conn->prepare("SELECT COUNT(*) as total_staff FROM staff");
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            $row = $result->fetch_assoc();
                                                            $total_staff = $row['total_staff'];
                                                         ?>
                                                        <i class="feather icon-user bg-simple-c-blue card1-icon"></i>
                                                        <?php if ($total_staff == 0): ?>
                                                            <h4>No</h4>
                                                        <?php else: ?>
                                                            <h4><?= $total_staff ?></h4>
                                                        <?php endif; ?>
                                                        <p>Staff</p>
                                                        <a href="staff_list.php" class="more-info">More Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card user-widget-card bg-c-pink">
                                                    <div class="card-block">
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT COUNT(*) as total_customer FROM customers");
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            $row = $result->fetch_assoc();
                                                            $total_customer = $row['total_customer'];
                                                         ?>
                                                        <i class="feather icon-user bg-simple-c-pink card1-icon"></i>
                                                        <?php if ($total_customer == 0): ?>
                                                            <h4>No</h4>
                                                        <?php else: ?>
                                                            <h4><?= $total_customer ?></h4>
                                                        <?php endif; ?>
                                                        <p>Customers</p>
                                                        <a href="customer_list.php" class="more-info">More Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card user-widget-card bg-c-green">
                                                    <div class="card-block">
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT COUNT(*) as total_depart FROM departments");
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            $row = $result->fetch_assoc();
                                                            $total_depart = $row['total_depart'];
                                                         ?>
                                                        <i class="feather icon-home bg-simple-c-green card1-icon"></i>
                                                        <?php if ($total_depart == 0): ?>
                                                            <h4>No</h4>
                                                        <?php else: ?>
                                                            <h4><?= $total_depart ?></h4>
                                                        <?php endif; ?>
                                                        <p>Department</p>
                                                        <a href="department.php" class="more-info">More Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card user-widget-card bg-c-yellow">
                                                    <div class="card-block">
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT COUNT(*) as total_ticket FROM tickets");
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            $row = $result->fetch_assoc();
                                                            $total_ticket = $row['total_ticket'];
                                                         ?>
                                                        <i class="feather icon-alert-triangle bg-simple-c-yellow card1-icon"></i>
                                                        <?php if ($total_ticket == 0): ?>
                                                            <h4>No</h4>
                                                        <?php else: ?>
                                                            <h4><?= $total_ticket ?></h4>
                                                        <?php endif; ?>
                                                        <p>All Tickets</p>
                                                        <a href="ticket_list.php" class="more-info">More Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- user card  end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                    
                                </div>
                                <div id="styleSelector"> </div>
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
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>