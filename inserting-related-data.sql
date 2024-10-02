-- Create tables
CREATE TABLE continent (
    continent_id INT PRIMARY KEY,
    continent_name VARCHAR(255) NOT NULL
);

CREATE TABLE country (
    country_id INT PRIMARY KEY,
    country_name VARCHAR(255) NOT NULL,
    continent_id INT,
    FOREIGN KEY (continent_id) REFERENCES continent(continent_id)
);

CREATE TABLE district (
    district_id INT PRIMARY KEY,
    district_name VARCHAR(255) NOT NULL,
    country_id INT,
    FOREIGN KEY (country_id) REFERENCES country(country_id)
);

-- Insert data
-- Inserting data into the 'continent' table
INSERT INTO continent (continent_id, continent_name) VALUES
    (1, 'Asia'),
    (2, 'Europe'),
    (3, 'North America');

-- Inserting data into the 'country' table
INSERT INTO country (country_id, country_name, continent_id) VALUES
    (101, 'China', 1),
    (102, 'India', 1),
    (201, 'Germany', 2),
    (202, 'France', 2),
    (301, 'USA', 3),
    (302, 'Canada', 3);

-- Inserting data into the 'district' table
INSERT INTO district (district_id, district_name, country_id) VALUES
    (1001, 'Beijing', 101),
    (1002, 'Shanghai', 101),
    (1003, 'Mumbai', 102),
    (2001, 'Berlin', 201),
    (2002, 'Munich', 201),
    (2011, 'Paris', 202),
    (2012, 'Lyon', 202),
    (3001, 'New York City', 301),
    (3002, 'Los Angeles', 301),
    (3011, 'Toronto', 302),
    (3012, 'Vancouver', 302);











-- is php formart

--<?php

-- // Replace these values with your actual database connection details
-- $host = "your_database_host";
-- $username = "your_username";
-- $password = "your_password";
-- $database = "your_database_name";

-- // Create a connection
-- $conn = new mysqli($host, $username, $password, $database);

-- // Check the connection
-- if ($conn->connect_error) {
--     die("Connection failed: " . $conn->connect_error);
-- }

-- // Get user inputs (replace these with actual user input mechanisms)
-- $continent_name = $_POST['continent_name'];
-- $country_name = $_POST['country_name'];
-- $district_name = $_POST['district_name'];

-- // Insert data into the 'continent' table
-- $continent_insert_query = "INSERT INTO continent (continent_name) VALUES ('$continent_name')";
-- $conn->query($continent_insert_query);
-- $continent_id = $conn->insert_id;  // Get the auto-generated ID

-- // Insert data into the 'country' table
-- $country_insert_query = "INSERT INTO country (country_name, continent_id) VALUES ('$country_name', $continent_id)";
-- $conn->query($country_insert_query);
-- $country_id = $conn->insert_id;  // Get the auto-generated ID

-- // Insert data into the 'district' table
-- $district_insert_query = "INSERT INTO district (district_name, country_id) VALUES ('$district_name', $country_id)";
-- $conn->query($district_insert_query);

-- // Close the connection
-- $conn->close();

-- echo "Data inserted successfully.";

--?>
