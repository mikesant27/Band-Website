CREATE TABLE users (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ALBUM (
  id INT AUTO_INCREMENT PRIMARY KEY,
  album_name VARCHAR(255) NOT NULL,
  artist_name VARCHAR(255) NOT NULL,
  release_date DATE,
  genre VARCHAR(100) 
);

CREATE TABLE SONG (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  duration TIME NOT NULL,
  album_id INT,
  track_num INT,
  FOREIGN KEY (album_id) REFERENCES ALBUM(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE transactions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT FOREIGN KEY REFERENCES users(id),
  service_type VARCHAR(100),
  date_time DATETIME,
  status ENUM('scheduled','completed','canceled') NOT NULL
);

/*
Maybe change service_type to products bought?

*/