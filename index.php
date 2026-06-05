<?php 
require_once 'includes/db.php';
include 'includes/header.php'; 

// Fetch quick statistics
$v_count = $pdo->query("SELECT COUNT(*) FROM vehicles")->fetchColumn();
$c_count = $pdo->query("SELECT COUNT(*) FROM customers")->fetchColumn();
$r_count = $pdo->query("SELECT COUNT(*) FROM rentals")->fetchColumn();
?>

<div class="row text-center my-4">
    <div class="col-md-12 mb-4">
        <h1 class="display-5 fw-bold">Fleet Management Dashboard</h1>
        <p class="text-muted">Welcome back. Here is your operational overview.</p>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body py-4">
                <h3>Total Fleet</h3>
                <p class="display-4 font-weight-bold"><?= $v_count ?></p>
                <a href="vehicles.php" class="btn btn-sm btn-outline-light">Manage Cars</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white shadow-sm">
            <div class="card-body py-4">
                <h3>Registered Customers</h3>
                <p class="display-4 font-weight-bold"><?= $c_count ?></p>
                <a href="customers.php" class="btn btn-sm btn-outline-light">Manage Clients</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-warning text-dark shadow-sm">
            <div class="card-body py-4">
                <h3>Active Rentals</h3>
                <p class="display-4 font-weight-bold"><?= $r_count ?></p>
                <a href="rentals.php" class="btn btn-sm btn-outline-dark">Bookings Center</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>