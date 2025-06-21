# Hi there! 👋

This GitHub repository provides an email validation web app using php

# Email Validation App with PHP and MySQL

This project was done with the PHP programming language and MYSQL for the database

## For this repository the requisites are:

Before diving into the repository you have to install the following environments on your local machine

In the project directory, you can run:
1.  **PHP 8.0:** Which you can download from the official php.net website.
2.  **Wampserver:** Download wampserver from the official wampserver website:
3.  **PHPmyadmin:** Which can be used through wampserver:
  
   
## How to run this example

To execute the weo app place the directory inside the wwww folder inside wampserver

1.  Start Wampserver and ensure all its services are running when its icon turns green.
2.  Access local host using default user name and password which is usually root and '' no password by default
3.  Open PHP my admin and type the SQL queries within SQL console to create the database
    ```bash
    CREATE DATABASE email_validator_db;
    USE email_validator_db;
    ```
4.  Create a Users table within the email_validator_db
     ```bash
    CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
    );
    ```
5.  Create a default admin user by using the INSERT SQL query
    ```bash
    INSERT INTO users (username, password) VALUES ('admin', '$2y$10$M/3F.hG9t.R9L1c.V0eQ2eX.f7.Q4.N.J6.W1.B8.S2.C5.T7.Q4.N.J6.W1.B8.S2.C5.T7.A2.X3');
    ```
6.  After setting up the data base and cloning the code from this Repository
    You can access the code from localhost with the link http://localhost/your_project_folder/index.php
