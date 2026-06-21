<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Testing Config Load ===\n";
require 'config/db.php';
echo "Config loaded successfully\n";
echo "PDO object: " . (isset($pdo) ? 'YES' : 'NO (NOT DEFINED)') . "\n";

echo "\n=== Testing Models Load ===\n";
require 'models/User.php';
echo "User model loaded\n";
require 'models/Note.php';
echo "Note model loaded\n";
require 'models/Category.php';
echo "Category model loaded\n";

echo "\n=== Testing Controllers Load ===\n";
require 'controllers/AuthController.php';
echo "AuthController loaded\n";
require 'controllers/NoteController.php';
echo "NoteController loaded\n";
require 'controllers/CategoryController.php';
echo "CategoryController loaded\n";

echo "\n=== Testing Routes Load ===\n";
require 'routes/web.php';
echo "Routes loaded\n";

echo "\nAll tests passed!\n";
?>
