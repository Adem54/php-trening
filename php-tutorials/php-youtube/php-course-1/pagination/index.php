<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//? dan onceki kismi bize getireblioyr
$base = strtok($_SERVER["REQUEST_URI"], '?' );
var_dump($base);


var_dump($_GET);


$host = 'localhost';
$dbname = 'testdb';
$username = 'adem';
$password = 'adem';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
     // Define the limit and offset

// Pagination variables
$itemsPerPage = 5;

// Get the current page or set the default to 1
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $itemsPerPage;
var_dump($offset);

// Fetch data from the database with limit and offset
$stmt = $pdo->prepare("SELECT * FROM user LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


//limit 3 3 tane getir demek , offset 3 demek ise 3 unu atla demek

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagination Example</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['username'] ?? "NULL") . " - " . htmlspecialchars($user['email'] ?? "NULL"); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    // Get the total number of records
    $totalStmt = $pdo->query("SELECT COUNT(*) FROM user");
    $totalItems = $totalStmt->fetchColumn();
    $totalPages = ceil($totalItems / $itemsPerPage);
    ?>

    <div>
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
        <?php endif; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
        <?php endif; ?>
    </div>
</body>
</html>
