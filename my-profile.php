<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /login/");
    exit;
}

$id = $_SESSION["id"];

// Include config file
require_once "config.php";


/* Select queries return a resultset */

$query = "SELECT firstname, lastname, personal, image, visibility FROM users WHERE id = '$id'";


if ($result = mysqli_query($link, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $personal = $row["personal"];
        $visibility = $row["visibility"];
        $image = $row["image"];

    }  /* free result set */
    mysqli_free_result($result);
}

// Close connection
mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceBook Portal | My Profile</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link rel="stylesheet" href="/css/checkboxes.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php include "nav.php"; ?>
<div class="jumbotron">
    <div class="container profile"><h1>Welcome <?php echo $firstname; ?></h1></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="profile-image">
                <form id="uploadForm" method="post">
                    <p>Change profile image:</p>
                    <label for="inputFile">Browse <span class="loader"><img src="/img/loader-1.gif"></span></label>

                    <input name="upload_image" type="file" id="inputFile"/>
                </form>
                <div id="targetLayer"><img src="/<?php echo $image; ?>" alt=""></div>
            </div>
        </div>
        <div class="col-md-6">

            <form id="update" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" value="<?php echo $image ?>" id="image">
                <input type="hidden" value="<?php echo $id ?>" id="id">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname; ?>">
                </div>
                <div class="form-group">
                    <label for="personal">Personal description:</label>
                    <textarea rows="5" id="personal" name="personal" class="form-control" pattern="^[a-zA-Z0-9]+$"><?php echo $personal; ?></textarea>
                    <p id="remain">Remaining characters: <span>256</span></p>
                </div>
                <div class="form-group account-visibility">

                    <p>Public account?</p>
                    <div class="ckbx-style-11">

                        <input class="custom-checkbox-slider" name="visibility" id="visibility" type="checkbox" <?php if ($visibility == 1) {
                            echo "checked='checked'";
                        } ?>>
                        <label for="visibility"></label>
                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>

            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="//code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="/js/my-profile-ajax.js"></script>
<script src="/js/script.js"></script>
<script>
    var textlimit = 256;

    remain = textlimit - $('textarea').val().length;
    $('#remain span').text(remain);

    $('textarea').keyup(function () {
        var tlength = $(this).val().length;
        $(this).val($(this).val().substring(0, textlimit));
        var tlength = $(this).val().length;
        remain = textlimit - parseInt(tlength);
        $('#remain span').text(remain);
    });
</script>
</body>
</html>
