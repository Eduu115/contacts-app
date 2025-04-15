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
-- TENGO QUE HACER UN POPULATE TAMBIEN
CREATE TABLE adresses(
    adress_id INT AUTO_INCREMENT PRIMARY KEY,
    adress_name VARCHAR(255),
    adress_location VARCHAR(255),
    contact_id INT NOT NULL,
    FOREIGN KEY (contact_id) REFERENCES contacts(id)
);      

-- POPULATE SCRIPT NO SE PUEDE USAR YA QUE LA CONTRASEÑA SE HASHEA EN EL PHP

-- -- Insert users
-- INSERT INTO users (name, email, password) VALUES
-- ('Alice Johnson', 'alice@example.com', 'hashed_password_1'),
-- ('Bob Smith', 'bob@example.com', 'hashed_password_2'),
-- ('Charlie Brown', 'charlie@example.com', 'hashed_password_3');
-- -- Insert contacts
-- INSERT INTO contacts (name, phone_number, user_id) VALUES
-- ('Emma Stone', '123456789', 1),
-- ('Daniel Craig', '987654321', 1),
-- ('Sophie Turner', '456123789', 2),
-- ('Tom Hiddleston', '789321456', 3),
-- ('Natalie Portman', '321654987', 2),
-- ('Chris Evans', '654987321', 3);

-- INSERT INTO adresses (adress_name, adress_location, contact_id) VALUES
-- ('Home', '123 Maple Street, Springfield', 1),
-- ('Work', '456 Oak Avenue, Springfield', 1),
-- ('Home', '789 Pine Road, Metropolis', 2),
-- ('Work', '101 Elm Street, Metropolis', 3),
-- ('Vacation House', '202 Palm Lane, Oceanview', 4),
-- ('Apartment', '303 Sunset Blvd, Los Angeles', 5),
-- ('Office', '909 Silicon Alley, San Francisco', 5),
-- ('Studio', '111 Broadway St, New York', 6);
