-- Active: 1743887229115@@127.0.0.1@3306
DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE users(
    user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR (255) UNIQUE,
    password VARCHAR(255) 
);

CREATE table contacts(
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(255),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
