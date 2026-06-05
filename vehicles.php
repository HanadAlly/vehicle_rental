<?php
require_once 'includes/db.php';

// Process Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_vehicle'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $rate = $_POST['daily_rate'];

    $stmt = $pdo->prepare("INSERT INTO vehicles (make, model, year, daily_rate) VALUES (?, ?, ?, ?)");
    $stmt->execute([$make, $model, $year, $rate]);
    header("Location: vehicles.php");
    exit;
}