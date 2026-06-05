<?php 
require_once 'includes/db.php';
include 'includes/header.php'; 

// Fetch quick statistics
$v_count = $pdo->query("SELECT COUNT(*) FROM vehicles")->fetchColumn();
$c_count = $pdo->query("SELECT COUNT(*) FROM customers")->fetchColumn();
$r_count = $pdo->query("SELECT COUNT(*) FROM rentals")->fetchColumn();
?>