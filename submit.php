<?php
// Include database connection
require 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['phone']; // Corrected input name
    $city = $_POST['city']; // Corrected input name
    $message = $_POST['Message']; // Corrected input name

    // Insert data into database
    $sql = "INSERT INTO contact_form_data (name, email, contact_number, city, message) 
            VALUES (:name, :email, :contact_number, :city, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':contact_number', $contactNumber, PDO::PARAM_STR);
    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->execute();

    // Redirect to a success page or display a success message
    header('Location: success.html');
    exit();
}
?>

