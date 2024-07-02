<?php
include 'includes/functions.php';

// Retrieve all students with their fees using a SQL join
$students_with_fees = getAllStudentsWithFees();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students' Fees</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Student Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_fees.php">Manage Fees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_fees.php">All Students' Fees</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>All Students' Fees</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Fee Amount</th>
                <th>Date Paid</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students_with_fees as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['date_paid']; ?></td>
                    <td><?php echo $row['created_on']; ?></td>
                    <td>
                    <!-- <td><button class="btn btn-primary btn-sm" onclick="manageFees(' . $student['id'] . ')">Manage Fees</button></td> -->
                        <!-- <a href="manage_fees.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary btn-sm">Manage Fees</a> -->
                        <!-- <a href="manage_fees.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary btn-sm">Manage Fees</a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
