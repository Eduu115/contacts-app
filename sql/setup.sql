-- Active: 1743887229115@@127.0.0.1@3306
DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR (255) UNIQUE,
    password VARCHAR(255) 
);

INSERT INTO users (name, email, PASSWORD) VALUES ("Carlos", "test@test.com", "123");

CREATE table contacts(
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(255)
);

INSERT INTO contacts (name, phone_number) VALUES("Pepe", "123456789");
INSERT INTO contacts (name, phone_number) VALUES("Edu", "637685657");
INSERT INTO contacts (name, phone_number) VALUES("Jose", "987654321");
