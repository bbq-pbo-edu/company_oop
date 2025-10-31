DROP DATABASE IF EXISTS company;
CREATE DATABASE company;

USE company;

CREATE TABLE employee(
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(32) NOT NULL,
    lastName varchar(32) NOT NULL
);

INSERT INTO employee(firstName, lastName)
VALUES ('Max', 'Mueller'),
       ('Tim', 'Schmidt'),
       ('Tom', 'Meier');