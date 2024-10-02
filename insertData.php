<?php
// // Assuming you have a database connection established
// $servername = "your_database_server";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Insert data into the database (replace with your actual query)
// $sql = "INSERT INTO your_table (column1, column2) VALUES ('value1', 'value2')";
// if ($conn->query($sql) === TRUE) {
//     echo "Record inserted successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>

<?php
// // Start the session
// session_start();

// // Assuming you have a database connection established
// $servername = "your_database_server";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Check if the cart data is available in the session
// if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
//     // Loop through each item in the cart and insert into the database
//     foreach ($_SESSION['cart'] as $item) {
//         $product_id = $item['id'];
//         $product_name = $item['name'];
//         $product_price = $item['price'];

//         // Insert data into the database
//         $sql = "INSERT INTO your_cart_table (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";

//         if ($conn->query($sql) !== TRUE) {
//             echo "Error inserting record: " . $conn->error;
//         }
//     }

//     echo "Cart data inserted into the database.";
// } else {
//     echo "Cart is empty.";
// }

// $conn->close();
?>


<!--  inserting data from session -->

<?php

// Replace these values with your actual database connection details
$host = "your_database_host";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Check if the session variable is set
if (isset($_SESSION['location_data'])) {
    // Get data from the session
    $location_data = $_SESSION['location_data'];

    // Extract individual values from the array (modify as per your data structure)
    $continent_name = $location_data['continent_name'];
    $country_name = $location_data['country_name'];
    $district_name = $location_data['district_name'];

    // Insert data into the 'continent' table
    $continent_insert_query = "INSERT INTO continent (continent_name) VALUES ('$continent_name')";
    $conn->query($continent_insert_query);
    $continent_id = $conn->insert_id;  // Get the auto-generated ID

    // Insert data into the 'country' table
    $country_insert_query = "INSERT INTO country (country_name, continent_id) VALUES ('$country_name', $continent_id)";
    $conn->query($country_insert_query);
    $country_id = $conn->insert_id;  // Get the auto-generated ID

    // Insert data into the 'district' table
    $district_insert_query = "INSERT INTO district (district_name, country_id) VALUES ('$district_name', $country_id)";
    $conn->query($district_insert_query);

    echo "Data inserted successfully.";
} else {
    echo "Error: Session variable not set.";
}

// Close the connection
$conn->close();

?>
