DROP DATABASE IF EXISTS company;
CREATE DATABASE company;

USE company;

CREATE TABLE employee(
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(32) NOT NULL,
    last_name varchar(32) NOT NULL
);

INSERT INTO employee(first_name, last_name)
VALUES ('Max', 'Mueller'),
       ('Tim', 'Schmidt'),
       ('Tom', 'Meier');