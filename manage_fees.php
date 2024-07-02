<?php
include 'includes/functions.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $student = getStudentById($student_id);
    $fees = getFees($student_id);
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fees</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
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
    <h2>Manage Fees for <?php echo $student['name']; ?></h2>
    <form id="feeForm">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="date_paid" class="form-label">Date Paid</label>
            <input type="date" class="form-control" id="date_paid" name="date_paid" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Fee</button>
    </form>

    <h2 class="mt-5">Fees List</h2>
    <table class="table table-bordered mt-3" id="feesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date Paid</th>
                <th>Time on Paid</th>
                <th>Edit / Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($fees as $fee): ?>
    <tr>
        <td><?php echo $fee['id']; ?></td>
        <td><?php echo $fee['amount']; ?></td>
        <td><?php echo $fee['date_paid']; ?></td>
        <td><?php echo $fee['created_on']; ?></td>
        <td>
            <button class="btn btn-sm btn-warning me-2" onclick="editFee(<?php echo $fee['id']; ?>)">
                <i class="bi bi-pencil"></i> Edit
            </button>
            <button class="btn btn-sm btn-danger" onclick="deleteFee(<?php echo $fee['id']; ?>)">
                <i class="bi bi-trash"></i> Delete
            </button>
        </td>
    </tr>
<?php endforeach; ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#feeForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: $(this).serialize() + '&action=addFee',
            dataType: 'json',
            success: function(response) {
                if(response.code === 200) {
                    alert(response.message);
                    location.reload();
                } else {
                    alert('Failed to add fee');
                }
            },
            // error: function(xhr, status, error) {
            //     console.error(xhr.responseText);
            //     alert('An error occurred. Please try again.');
            // }
        });
    });
});


</script>

</body>
</html>
