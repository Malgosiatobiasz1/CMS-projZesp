<?php session_start();

$cart = array();

if(isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];

    if (isset($_POST['remove'])) {
        unset($cart[$_POST['key']]);

        if (is_array($cart) && !empty($cart))
            $_SESSION["cart"] = $cart;
        else
            $_SESSION["cart"] = null;

        echo "lll\n";
        print_r($cart);
        echo "\nlll";
    }
    else if (isset($_POST['buy'])) {
        $_SESSION["cart"] = null;

        header('Location: buy.php');
        exit();
    }
    else if (isset($_POST['clear'])) {
        $_SESSION["cart"] = null;
    }
}

if (isset($_POST['add'])) {
    array_push($cart, $_POST['id']);

    $_SESSION["cart"] = $cart;
}

header('Location: index.php');