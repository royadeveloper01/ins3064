-- SQL file for PHP User Management System
-- SQL file for a simple Laptop Store demo project
-- Database: LaptopStore
-- Table: laptops

-- Create database
CREATE DATABASE IF NOT EXISTS `LaptopStore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `LaptopStore`;

-- Create laptops table for product data
CREATE TABLE IF NOT EXISTS `laptops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data (optional)
INSERT INTO `laptops` (`brand`, `model`, `price`, `description`) VALUES
('Dell', 'XPS 15', 1799.99, 'A powerful laptop with a stunning 15-inch display, ideal for creative professionals.'),
('Apple', 'MacBook Pro 14', 1999.00, 'The 14-inch MacBook Pro with M3 chip delivers incredible performance for demanding workflows.'),
('HP', 'Spectre x360', 1249.50, 'A versatile 2-in-1 laptop with a premium design and long battery life.');