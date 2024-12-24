-- Create the database
CREATE DATABASE shirinyota;

-- Use the created database
USE shirinyota;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the stock table
CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    transaction_type ENUM('in', 'out') NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a sample user (for login)
INSERT INTO users (username, password) VALUES ('Iraguha', 'Iraguha@');
