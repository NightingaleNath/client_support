<?php 
include('../includes/config.php');

$id = $_POST['id'];
$dname = $_POST['dname'];
$description = $_POST['description'];

if (empty($dname) || empty($description)) {
    $response = array('status' => 'error', 'message' => 'Please fill in all fields');
    echo json_encode($response);
    exit;
}

$stmt = mysqli_prepare($conn, "UPDATE departments SET name=?, description=? WHERE id=?");
mysqli_stmt_bind_param($stmt, 'ssi', $dname, $description, $id);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    $response = array('status' => 'success', 'message' => 'Department Updated Successfully');
    echo json_encode($response);
    exit;
} else {
    $response = array('status' => 'error', 'message' => 'Failed to update department');
    echo json_encode($response);
    exit;
}
?>
