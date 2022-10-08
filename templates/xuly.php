<?php
    require_once './../classes/customer.php';
    $cs= new Customer();

    if(isset($_POST["act"]) && $_POST["act"]=='signup'){
        if($cs->signup($_POST)){
            echo('1');
        }else{
            echo('0');
        }
    }
?>