<?php

require_once "config.php";

// Prepare an insert statement
$sql = "UPDATE users SET ban = ? WHERE id = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $ban, $id);

    $id = $_REQUEST["id"];
    $ban = $_REQUEST["ban"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

    } else {
        echo "Something went wrong. Please try again later.";
    }
}

// Close statement
mysqli_stmt_close($stmt);

/* Select queries return a resultset */

$query = "SELECT firstname, ban FROM users WHERE id = '$id'";


if ($result = mysqli_query($link, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {

        $firstname = $row["firstname"];
        $ban = $row["ban"] ? "deactivated" : "activated" ;

    }  /* free result set */
    mysqli_free_result($result);
}

// Close connection
mysqli_close($link);

echo $firstname . " is " .$ban;