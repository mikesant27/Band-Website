DROP DATABASE bandb;
CREATE DATABASE bandb;

CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  full_name varchar(100) DEFAULT NULL,
  FileData longblob DEFAULT NULL,
  role enum('admin','staff','customer') NOT NULL DEFAULT 'customer',
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE SONG (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  duration TIME NOT NULL,
  image_path varchar(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE SHOWS(
  id INT AUTO_INCREMENT PRIMARY KEY,
  location VARCHAR(255) NOT NULL,
  show_time DATETIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    transaction_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE blog (
    id INT AUTO_INCREMENT PRIMARY KEY,        
    title VARCHAR(255) NOT NULL,              
    content TEXT NOT NULL,                    
    creator VARCHAR(100) NOT NULL,            
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);

/*
Note: Since we use password_hash() to hash the passwords, you cannot insert a new user in phpmyadmin without the password being stored as plain text

To get around this, create a new user and run the following query:

UPDATE users SET role='admin' WHERE id=1;

After running this query you can create new users and upgrade them to staff/admin using the admin dashboard.

*/