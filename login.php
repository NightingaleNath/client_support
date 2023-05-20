<?php
session_start();
include('includes/config.php');
require_once 'alerts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Query from staff table
    $staffQuery = mysqli_query($conn, "SELECT * FROM staff WHERE email='$email' AND password='$password'");
    if (!$staffQuery) {
        // Query execution failed, display error message
        echo "Error: " . mysqli_error($conn);
    } else {
        $staffCount = mysqli_num_rows($staffQuery);
        if ($staffCount > 0) {
            // Staff user exists, set session variables and redirect to staff/admin page based on user type
            $recordsRow = mysqli_fetch_assoc($staffQuery);
            $_SESSION['slogin'] = $recordsRow['id'];
            $_SESSION['srole'] = $recordsRow['user_type'];
            $_SESSION['semail'] = $recordsRow['email'];
            $_SESSION['sfirstname'] = $recordsRow['firstname'];
            $_SESSION['slastname'] = $recordsRow['lastname'];
            $_SESSION['smiddlename'] = $recordsRow['middlename'];
            $_SESSION['scontact'] = $recordsRow['contact'];
            $_SESSION['saddress'] = $recordsRow['address'];

            if ($recordsRow['user_type'] == '1') {
                echo "<script>alert('Successfully logged in as admin'); window.location = 'admin/index.php'</script>";
            } elseif ($recordsRow['user_type'] == '2') {
                echo "<script>alert('Successfully logged in as staff'); window.location = 'admin/index.php'</script>";
            } else {
                echo "<script>alert('Invalid user type'); window.location = 'index.php'</script>";
            }
        } else {
            // Query from customers table
            $customerQuery = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email' AND password='$password'");
            if (!$customerQuery) {
                // Query execution failed, display error message
                echo "Error: " . mysqli_error($conn);
            } else {
                $customerCount = mysqli_num_rows($customerQuery);
                if ($customerCount > 0) {
                    // Customer user exists, set session variables and redirect to customer page
                    $recordsRow = mysqli_fetch_assoc($customerQuery);
                    $_SESSION['slogin'] = $recordsRow['id'];
                    $_SESSION['srole'] = $recordsRow['user_type'];
                    $_SESSION['semail'] = $recordsRow['email'];
                    $_SESSION['sfirstname'] = $recordsRow['firstname'];
                    $_SESSION['slastname'] = $recordsRow['lastname'];
                    $_SESSION['smiddlename'] = $recordsRow['middlename'];
                    $_SESSION['scontact'] = $recordsRow['contact'];
                    $_SESSION['saddress'] = $recordsRow['address'];
                    echo "<script>alert('Successfully logged in as customer'); window.location = 'customer/index.php'</script>";
                } else {
                    // User doesn't exist, display error message
                    echo "<script>alert('Invalid Details'); window.location = 'index.php'</script>";
                }
            }
        }
    }
}
?>
