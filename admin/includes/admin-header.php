<?php include '../includes/db_connect.php' ?>
<?php include '../functions.php' ?>

<?php

ob_start();
?>

<?php session_start(); ?>


<?php

if(!isset($_SESSION['user_role'])){

header("Location: ../index.php");

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projekt sklepu internetowego</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    
    <link href="css/sb-admin.css" rel="stylesheet" type="text/css">

    
    <link href="js/skins/lightgray/skin.min.css" rel="stylesheet" type="text/css">
    <link href="js/skins/lightgray/content.min.css" rel="stylesheet" type="text/css">

    
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



</head>