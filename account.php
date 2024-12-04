<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.html");
    exit;
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'hack';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje konto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="navigation"></div>

    <div class="container mt-5">
        <h1>Moje konto</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informacje o profilu</h5>
                <p class="card-text">Nazwa użytkownika: <?php echo htmlspecialchars($user['username']); ?></p>
                <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <a href="logout.php" class="btn btn-danger">Wyloguj się</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="template.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadNavbar();
        });
    </script>
</body>
</html>
