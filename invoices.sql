CREATE DATABASE invoice_generator;

USE invoice_generator;

CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255),
    customer_email VARCHAR(255),
    invoice_date DATE,
    subtotal DECIMAL(10,2),
    gst DECIMAL(10,2),
    grand_total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT,
    item_name VARCHAR(255),
    quantity INT,
    price DECIMAL(10,2),
    total DECIMAL(10,2)
);