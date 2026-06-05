<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_rental'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $customer_id = $_POST['customer_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Complex State Logic: Database Transaction
    $pdo->beginTransaction();
    try {
        // 1. Insert Rental Record
        $stmt = $pdo->prepare("INSERT INTO rentals (vehicle_id, customer_id, start_date, end_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$vehicle_id, $customer_id, $start_date, $end_date]);

        // 2. Change car status dynamically so it cannot be double booked
        $update = $pdo->prepare("UPDATE vehicles SET status = 'Rented' WHERE id = ?");
        $update->execute([$vehicle_id]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
    }

    header("Location: rentals.php");
    exit;
}

// Fetch relationships for tables
$rentals = $pdo->query("SELECT rentals.id, vehicles.make, vehicles.model, customers.name, rentals.start_date, rentals.end_date 
                        FROM rentals 
                        JOIN vehicles ON rentals.vehicle_id = vehicles.id 
                        JOIN customers ON rentals.customer_id = customers.id")->fetchAll();

$available_cars = $pdo->query("SELECT * FROM vehicles WHERE status = 'Available'")->fetchAll();
$all_customers = $pdo->query("SELECT * FROM customers")->fetchAll();

include 'includes/header.php';
?>