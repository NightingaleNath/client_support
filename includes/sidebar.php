<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'dashboard') ? 'active' : ''; ?>">
                <a href="index.php">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>                             
            </li>  
        </ul>
        <div class="pcoded-navigatio-lavel">Users</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu <?php echo ($page_name == 'staff' || $page_name == 'new_staff' || $page_name == 'staff_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Staff</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'new_staff') ? 'active' : ''; ?>">
                        <a href="new_staff.php">
                            <span class="pcoded-mtext">New Staff</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'staff_list') ? 'active' : ''; ?>">
                        <a href="staff_list.php">
                            <span class="pcoded-mtext">Staff List</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu <?php echo ($page_name == 'customer' || $page_name == 'new_customer' || $page_name == 'customer_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Customer</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'new_customer') ? 'active' : ''; ?>">
                        <a href="new_customer.php">
                            <span class="pcoded-mtext">New Customer</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'customer_list') ? 'active' : ''; ?>">
                        <a href="customer_list.php">
                            <span class="pcoded-mtext">Customer List</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Pages</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'department') ? 'active' : ''; ?>">
                <a href="department.php">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Department</span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu <?php echo ($page_name == 'ticket' || $page_name == 'new_ticket' || $page_name == 'ticket_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Tickets</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'new_ticket') ? 'active' : ''; ?>">
                        <a href="new_ticket.php">
                            <span class="pcoded-mtext">New Ticket</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'ticket_list') ? 'active' : ''; ?>">
                        <a href="ticket_list.php">
                            <span class="pcoded-mtext">Ticket List</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Support</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="https://www.youtube.com/@codelytical" target="_blank">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Contact Us</span>
                </a>
            </li>
    </div>
</nav>
