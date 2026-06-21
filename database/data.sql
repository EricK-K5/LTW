-- Schema cho ứng dụng quản lý ghi chú
-- Chạy file này trong MySQL để tạo cơ sở dữ liệu và bảng cần thiết

CREATE DATABASE IF NOT EXISTS notes_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE notes_app;

-- Bảng người dùng
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng danh mục (tùy chọn)
CREATE TABLE IF NOT EXISTS categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(150) NOT NULL,
	user_id INT DEFAULT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	UNIQUE KEY unique_category_name (name)
);

-- Bảng ghi chú
CREATE TABLE IF NOT EXISTS notes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	content TEXT,
	category_id INT DEFAULT NULL,
	user_id INT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NULL DEFAULT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);
