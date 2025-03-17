-- Create the database
CREATE DATABASE IF NOT EXISTS dj_inventory;
USE dj_inventory;

-- Create the inventory table
CREATE TABLE IF NOT EXISTS inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Insert sample data
INSERT INTO inventory (product_name, quantity, price) VALUES
('DJ Mixer', 5, 15000.00),
('Speakers', 10, 7500.00),
('Microphone', 15, 3000.00),
('Lighting Kit', 8, 12000.00),
('Fog Machine', 4, 5000.00);
