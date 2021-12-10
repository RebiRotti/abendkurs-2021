<?php
//var_dump((int)$_POST['entryID']);
include 'db.php';

// Prepare a DELETE statement
$stmt = $conn->prepare("DELETE FROM beispiel_1 WHERE id = ?");

// Check if prepare() failed.
// prepare() can fail because of syntax errors, missing privileges, ....
if ( false === $stmt ) {
    error_log('mysqli prepare() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );

    // Since all the following operations need a valid/ready statement object
    // it doesn't make sense to go on
    exit();
}

// Bind the value to the statement
$value = (int)$_POST['entryID'];
$bind = $stmt->bind_param('i', $value);

// Check if bind_param() failed.
// bind_param() can fail because the number of parameter doesn't match the placeholders
// in the statement, or there's a type conflict, or ....
if ( false === $bind ) {
    error_log('bind_param() failed:');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
    exit();
}

// Execute the query
$exec = $stmt->execute();

// Check if execute() failed.
// execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
if ( false === $exec ) {
    error_log('mysqli execute() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
}

// Close the prepared statement
$stmt->close();

// Close connection
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
