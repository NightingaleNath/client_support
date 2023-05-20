<?php
date_default_timezone_set('Africa/Accra');
include('../includes/config.php');

function addTicket($subject, $description, $status, $priority, $department_id, $customer_id) {
    global $conn;

    if (empty($subject) || empty($description) || empty($priority) || empty($department_id) || empty($customer_id)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    $status = 0; // Set initial status to 0
    $date_created = date('Y-m-d H:i:s');

    // Sanitize and encode the description
    $description = htmlentities(str_replace("'","&#x2019;", $description));

    $stmt = mysqli_prepare($conn, "INSERT INTO tickets (subject, description, status, priority, department_id, customer_id, date_created) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssisiis', $subject, $description, $status, $priority, $department_id, $customer_id, $date_created);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Ticket added successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to add ticket');
        echo json_encode($response);
        exit;
    }
}

function updateTicket($id, $subject, $description, $department_id, $customer_id) {
    global $conn;

    if (empty($subject) || empty($description) || empty($department_id) || empty($customer_id)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    $status = 0; // Set initial status to 0
    $date_created = date('Y-m-d H:i:s');

    // Sanitize and encode the description
    $description = htmlentities(str_replace("'","&#x2019;", $description));

    $stmt = mysqli_prepare($conn, "UPDATE tickets SET subject=?, description=?, department_id=?, customer_id=?, date_created=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'ssiisi', $subject, $description, $department_id, $customer_id, $date_created, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Ticket updated successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update ticket');
        echo json_encode($response);
        exit;
    }
}

function updatePriority($id, $priority) {
    global $conn;

    if (empty($id) || empty($priority)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    // Update the priority value in the tickets table
    $stmt = mysqli_prepare($conn, "UPDATE tickets SET priority = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $priority, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Priority updated successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update priority');
        echo json_encode($response);
        exit;
    }
}

function updateStatus($id, $status) {
    global $conn;

    if (empty($id)) {
        $response = array('status' => 'error', 'message' => 'Please fill in all required fields');
        echo json_encode($response);
        exit;
    }

    // Update the status value in the tickets table
    $stmt = mysqli_prepare($conn, "UPDATE tickets SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'ii', $status, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Status updated successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update status');
        echo json_encode($response);
        exit;
    }
}

function deleteTicket($id) {
    global $conn;

    $stmt = mysqli_prepare($conn, "DELETE FROM tickets WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Ticket Deleted Successfully');
        echo json_encode($response);
        exit;
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to delete ticket');
        echo json_encode($response);
        exit;
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'tickets-add') {
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $department_id = $_POST['department'];
    $customer_id = $_POST['customer'];
    $status = $_POST['status'];

    $response = addTicket($subject, $description, $status, $priority, $department_id, $customer_id);
    echo $response;

} else if (isset($_POST['action']) && $_POST['action'] === 'update-ticket-priority') {
    $id = $_POST['id'];
    $priority = $_POST['priority'];

    $response = updatePriority($id, $priority);
    echo $response;

} else if (isset($_POST['action']) && $_POST['action'] === 'update-ticket-status') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $response = updateStatus($id, $status);
    echo $response;

} else if (isset($_POST['action']) && $_POST['action'] === 'remove-ticket') {
        $id = $_POST['id'];

        $response = deleteTicket($id);
        echo $response;
} else if (isset($_POST['action']) && $_POST['action'] === 'tickets-update') {
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $department_id = $_POST['department'];
    $customer_id = $_POST['customer'];

    $response = updateTicket($id, $subject, $description, $department_id, $customer_id);
    echo $response;
}
?>
