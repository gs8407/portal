<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /login");
    exit;
}
if ($_SESSION["admin"] !== 1) {
    header("location: /");
    exit;
}

// Include config file
require_once "config.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceBook Portal | Administrator</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/checkboxes.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php include "nav.php"; ?>
<div class="jumbotron administrator">
    <div class="container"><h1>Users</h1></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="manage">
                <table class="table">
                    <?php /* Select queries return a resultset */

                    $query = "SELECT firstname, lastname, email, id, ban FROM users WHERE admin != 1";

                    if ($result = mysqli_query($link, $query)) {

                        /* fetch associative array */
                        while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["firstname"]; ?> <?php echo $row["lastname"]; ?></td>
                                <td>
                                    <div class="ckbx-style-8">
                                        <input class="custom-checkbox-slider" name="ban" value="0" id="ban<?php echo $row["id"] ?>" type="checkbox" value="" data-id="<?php echo $row["id"] ?>" <?php if ($row["ban"] == 1) { echo "checked: checked"; } ?>>
                                        <label for="ban<?php echo $row["id"] ?>"></label>
                                    </div>

                                </td>
                            </tr>


                            <?php
                        }  /* free result set */
                        mysqli_free_result($result);
                    }

                    /* close connection */
                    mysqli_close($link);

                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="//code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/administrator-ajax.js"></script>

</body>
</html>
