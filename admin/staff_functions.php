<?php
include('../includes/config.php');

function updateStaffRecords($id, $firstname, $lastname, $middlename, $contact, $address, $department, $email, $password) {
    global $conn;

    if (empty($department) || empty($firstname) || empty($lastname) || empty($contact) || empty($address) || empty($email)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    if(empty($password)) {
        $stmt = mysqli_prepare($conn, "UPDATE staff SET department_id=?, firstname=?, lastname=?, middlename=?, contact=?, address=?, email=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'issssssi', $department, $firstname, $lastname, $middlename, $contact, $address, $email, $id);
    }
    else {
        $password_param = md5($password);
        $stmt = mysqli_prepare($conn, "UPDATE staff SET department_id=?, firstname=?, lastname=?, middlename=?, contact=?, address=?, email=?, password=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'isssssssi', $department, $firstname, $lastname, $middlename, $contact, $address, $email, $password_param, $id);
    }
    
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Staff member updated successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update staff member');
        echo json_encode($response);
        exit;
    }
}

function addStaffRecord($firstname, $lastname, $middlename, $contact, $address, $department, $email, $password) {
    global $conn;

    if (empty($department) || empty($firstname) || empty($lastname) || empty($contact) || empty($address) || empty($email) || empty($password)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    // Check if the record already exists
    $stmt = mysqli_prepare($conn, "SELECT id FROM staff WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($num_rows > 0) {
        $response = array('status' => 'error', 'message' => 'Staff member with this email already exists');
        echo json_encode($response);
        exit;
    }

    $password_param = md5($password);
    $stmt = mysqli_prepare($conn, "INSERT INTO staff (department_id, firstname, lastname, middlename, contact, address, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'isssssss', $department, $firstname, $lastname, $middlename, $contact, $address, $email, $password_param);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Staff member added successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to add staff member');
        echo json_encode($response);
        exit;
    }
}

function deleteStaff($id) {
    global $conn;

    $stmt = mysqli_prepare($conn, "DELETE FROM staff WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Staff Member Deleted Successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to delete staff');
        echo json_encode($response);
        exit;
    }
}


if(isset($_POST['action'])) {
    // Determine which action to perform
    if ($_POST['action'] === 'updateStaff') {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $department = $_POST['department'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $response = updateStaffRecords($id, $firstname, $lastname, $middlename, $contact, $address, $department, $email, $password);
        echo $response;

    } elseif ($_POST['action'] === 'staff-add') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $department = $_POST['department'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $response = addStaffRecord($firstname, $lastname, $middlename, $contact, $address, $department, $email, $password);
        echo $response;

    } elseif ($_POST['action'] === 'delete-staff') {
        $id = $_POST['id'];
        $response = deleteStaff($id);
        echo $response;
    }
}
?>