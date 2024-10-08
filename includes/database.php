
 <?php
$host = 'localhost';
$dbname = 'yourDatabaseName'; // Update with your MYSQL database name
$username = 'yourUsername'; // Update with your MySQL username
$password = 'yourPassword'; // Update with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?> 
