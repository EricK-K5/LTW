<?php
// KET NOI DATABASE
$DB_HOST = 'localhost';
$DB_NAME = 'notes_app';
$DB_USER = 'root';
$DB_PASS = '';

try {
	$pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8", $DB_USER, $DB_PASS);
	// HIEN THI LOI NEU CO
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// KHONG KET NOI DUOC THI DUNG + HIEN THI LOI
	die('Database connection failed: ' . $e->getMessage());
}
