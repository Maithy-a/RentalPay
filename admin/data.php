<?php
$host = 'localhost'; 
$db = 'rpms_db'; 
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Query to get monthly payment totals
$query = "SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(amount) AS total 
          FROM payment 
          GROUP BY month";
$stmt = $pdo->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for the chart
$months = array_column($results, 'month');
$totals = array_column($results, 'total');

// Return data as JSON
header('Content-Type: application/json');
echo json_encode(['months' => $months, 'totals' => $totals]);
?>
