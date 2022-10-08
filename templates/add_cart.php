<?php
    session_start();
    require_once ('./../classes/cart.php');
    $cart = new Cart();
    if(!isset($_POST['quantity'])){
        $cart->add_to_cart($_POST['masanpham'], 1);
    }else{
        $cart->add_to_cart($_POST['masanpham'], $_POST['quantity']);
    }
   
