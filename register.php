<?php
$host = 'mysql.railway.internal';
$user = 'root';
$password = 'ybJRTgmmMqBzeyNdOamHELvzSryiCgcd';
$dbname = 'railway';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!empty($username) && !empty($email) && !empty($password)) {
        try {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (username, password_hash, email) VALUES (:username, :password_hash, :email)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            session_start();
            $_SESSION['user_id'] = $conn->lastInsertId();
            header("Location: account.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Błąd: użytkownik o podanej nazwie użytkownika lub adresie e-mail już istnieje.";
            } else {
                echo "Błąd zapisu do bazy danych: " . $e->getMessage();
            }
        }
    } else {
        echo "Wszystkie pola są wymagane!";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
