<?php
<<<<<<< HEAD
// Ket noi database MySQL tren XAMPP.
=======
// KET NOI DATABASE
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
$DB_HOST = 'localhost';
$DB_NAME = 'notes_app';
$DB_USER = 'root';
$DB_PASS = '';

try {
<<<<<<< HEAD
    $pdo = new PDO(
        "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4",
        $DB_USER,
        $DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
=======
	$pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8", $DB_USER, $DB_PASS);
	// HIEN THI LOI NEU CO
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// KHONG KET NOI DUOC THI DUNG + HIEN THI LOI
	die('Database connection failed: ' . $e->getMessage());
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
}
