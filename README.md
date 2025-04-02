pro 8 sql :

CREATE DATABASE IF NOT EXISTS dbcrud;

USE dbcrud;

CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL
);

pro 9 sql :

CREATE DATABASE login;

USE login;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

pro 10 sql:

CREATE DATABASE employee;

USE employee;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    position VARCHAR(100) NOT NULL
);

pro 11 sql :

CREATE DATABASE IF NOT EXISTS FruitsDb;

USE FruitsDb;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO items (name) VALUES 
('Apple'),
('Banana'),
('Carrot'),
('Spinach');

pro 12sql:

CREATE DATABASE IF NOT EXISTS userDb;

USE userDb;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES 
('admin', 'admin123'),
('user1', 'password1'),
('user2', 'password2');

