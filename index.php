<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    //header("location: /login/");
    //exit;
}

// Include config file
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SpaceBook makes it easy to meet and socialize with new people through games, shared interests, friend suggestions, browsing profiles, and much more.">
    <title>SpaceBook Portal | Homepage</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Include Main navigation -->
<?php include "nav.php" ?>

<div class="jumbotron home">
    <div class="container"><h1>Welcome to SpaceBook</h1></div>
</div>

<section class="introduction">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>SpaceBook is new space for your creative ideas!!!</h2>
            </div>
        </div>
    </div>
</section>
<section class="users">
    <div class="container">
        <div class="row">

            <?php /* Select queries return a resultset */

            $query = "SELECT firstname, lastname, personal, image FROM users WHERE visibility = 1 && ban = 0 && admin != 1";


            if ($result = mysqli_query($link, $query)) {

                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="wrapper">
                            <?php if ($row["image"]) {
                                echo "<img src='".$row['image']."' class='image-responsive'  alt='Profile image of ". $row["firstname"] . " " . $row["lastname"] ."'/>";
                            } else {
                                echo "<img src='/images/placeholder.jpg' class='image-responsive'/>";
                            } ?>
                            <?php if ($row["firstname"]) {
                                echo "<h3>" . $row["firstname"] . " " . $row["lastname"] . "</h3>";
                            } ?>
                            <?php if ($row["personal"]) {
                                echo "<p>" . $row["personal"] . "</p>";
                            } ?>
                        </div>

                    </div>
                    <?php
                }  /* free result set */
                mysqli_free_result($result);
            }

            /* close connection */
            mysqli_close($link);

            ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

<script src="//code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
<script src="/js/script.js"></script>
<script src="js/my-profile-ajax.js"></script>

<script>
    /* Use matchHeight to make user cards same height in row */
    $(function () {
        $('.wrapper').matchHeight();
    });
</script>
</body>
</html>