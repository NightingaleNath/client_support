<?php include('../includes/config.php')?>

<?php
     $dname = $_POST['dname'];
     $description = $_POST['description'];

     if (empty($dname) || empty($description)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all fields');
        echo json_encode($response);
        exit;
     }

     $query = mysqli_query($conn,"select * from departments where name = '$dname'")or die(mysqli_error());
     $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
        $response = array('status' => 'error', 'message' => 'Department Already exist');
        echo json_encode($response);
        exit;
     }
     else{
        $query = mysqli_query($conn,"insert into departments (name, description)
            values ('$dname', '$description')      
        ") or die(mysqli_error()); 

        if ($query) {
            $response = array('status' => 'success', 'message' => 'Department Added Successfully');
            echo json_encode($response);
            exit;
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to add department');
            echo json_encode($response);
            exit;
        }
    }
?>

<?php 
include('../includes/config.php');

$dname = $_POST['dname'];
$description = $_POST['description'];

if (empty($dname) || empty($description)) {
    $response = array('status' => 'error', 'message' => 'Please fill in all fields');
    echo json_encode($response);
    exit;
}

// prepare the query to check if department already exists
$stmt = mysqli_prepare($conn, "SELECT * FROM departments WHERE name = ?");
mysqli_stmt_bind_param($stmt, "s", $dname);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($result);

if ($count > 0) { 
    $response = array('status' => 'error', 'message' => 'Department already exists');
    echo json_encode($response);
    exit;
} else {
    // prepare the query to insert a new department
    $stmt = mysqli_prepare($conn, "INSERT INTO departments (name, description) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $dname, $description);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $response = array('status' => 'success', 'message' => 'Department added successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to add department');
        echo json_encode($response);
        exit;
    }
}
?>
