<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($pageTitle)) {
            echo htmlspecialchars($pageTitle);
        } else {
            echo basename($_SERVER['PHP_SELF'], '.php');
        }
        ?>
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="icon" href="favicon.png" type="image/png">
</head>
<?php
session_start();
?>