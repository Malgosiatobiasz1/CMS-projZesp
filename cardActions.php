<?php session_start();

$card = array();

if(isset($_SESSION["card"])) {
    $card = $_SESSION["card"];

    if (isset($_POST['remove'])) {
        unset($card[$_POST['key']]);

        $_SESSION["card"] = $card;
    }
    else if (isset($_POST['buy'])) {
        $_SESSION["card"] = null;

        header('Location: buy.php');
        exit();
    }
    else if (isset($_POST['clear'])) {
        $_SESSION["card"] = null;
    }
}

if (isset($_POST['add'])) {
    array_push($card, $_POST['id']);

    $_SESSION["card"] = $card;
}

header('Location: index.php');