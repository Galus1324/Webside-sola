<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $option = $_POST['options'];

    // Prepare the data as an array
    $data = [$fname, $lname, $email, $option];

    // Open or create the CSV file for appending data
    $file = fopen('submissions.csv', 'a');

    // Write the data to the CSV file
    fputcsv($file, $data);

    // Close the file
    fclose($file);

    // Redirect back to the form with success flag
    header("Location: prijava.html?success=true");
    exit();
}
?>