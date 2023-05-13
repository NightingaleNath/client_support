<?php
session_start();
include('includes/config.php');
require_once 'alerts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        // Query execution failed, display error message
        echo "Error: " . mysqli_error($conn);
    } else {
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            // User exists, set session variables and redirect
            while ($row = mysqli_fetch_assoc($query)) {
                $_SESSION['alogin'] = $row['id'];
                $_SESSION['arole'] = $row['role'];
                $_SESSION['ausername'] = $row['username'];
                //login active status
                $emp_id = $_SESSION['alogin'];
                echo "<script>alert('Successfully logged in'); window.location = 'admin/index.php'</script>";            }
        } else {
            // User doesn't exist, display error message
            echo "<script>alert('Invalid Details'); window.location = 'index.php'</script>";
        }
    }
}
?>
