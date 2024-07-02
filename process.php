<?php
header('Content-Type: application/json'); // Ensure the response is sent as JSON
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'addStudent') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        if (addStudent($name, $email, $phone, $address)) {
            $data = array('message' => 'success', 'status' => true, 'code' => 200);
        } else {
            $data = array('message' => 'error', 'status' => true, 'code' => 400);
        }
    } elseif ($_POST['action'] == 'getStudents') {
        $students = getStudents();
        $output = '';
        
        foreach ($students as $student) {
            $output .= '<tr>
                <td>' . $student['id'] . '</td>
                <td>' . $student['name'] . '</td>
                <td>' . $student['email'] . '</td>
                <td>' . $student['phone'] . '</td>
                <td>' . $student['address'] . '</td>
                <td><button class="btn btn-primary btn-sm" onclick="manageFees(' . $student['id'] . ')">Manage Fees</button></td>
            </tr>';
        }
        
        $data = array('message' => $output, 'status' => true, 'code' => 200);
    } elseif ($_POST['action'] == 'addFee') {
        $student_id = $_POST['student_id'];
        $amount = $_POST['amount'];
        $date_paid = $_POST['date_paid'];
        
        if (addFee($student_id, $amount, $date_paid)) {
            $data = array('message' => 'success', 'status' => true, 'code' => 200);
        } else {
            $data = array('message' => 'error', 'status' => true, 'code' => 400);
        }
    }
    echo json_encode($data); // Correctly encode the array as JSON
}
