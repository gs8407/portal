<?php
require_once "config.php";

// Prepare an insert statement
$sql = "UPDATE users SET firstname = ?, lastname = ?, personal = ?, visibility = ?, image = ? WHERE id = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $firstname_update, $lastname_update, $personal_update, $visibility_update, $image_update, $id);

    $firstname_update = $_POST["firstname"];
    $lastname_update = $_POST["lastname"];
    $personal_update = $_POST["personal"];
    $visibility_update = $_POST["visibility"];
    $image_update = $_POST["image"];
    $id = $_POST["id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);