<?php
header('Content-Type: application/json'); // Set header to return JSON

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

    // Prepare a success response
    echo json_encode(['status' => 'success', 'message' => 'Vaša prijava je bila uspešno poslana!']);
    exit();
} else {
    // Prepare an error response
    echo json_encode(['status' => 'error', 'message' => 'Prišlo je do napake pri oddaji prijave.']);
    exit();
}
?>
