<?php
session_start();

if (isset($_SESSION['id'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Homepage of ID:  <?php echo $_SESSION['id']; ?></h1>
        <a href="./Controller/logout.php">Logout</a>
    </body>

    </html>

<?php
} else {
    header("Location: ./login.php");
    exit();
}
?>