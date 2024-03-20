CREATE DATABASE demo;

USE demo;

\\ Tạo bảng users và students

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100)
);


CREATE TABLE students (
    Rollno VARCHAR(10) PRIMARY KEY,
    Sname VARCHAR(30),
    Address VARCHAR(100),
    Email VARCHAR(100)
);
