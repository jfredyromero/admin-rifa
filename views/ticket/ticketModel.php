<?php

include_once "../../connection/connection.php";

if ($_POST['registro'] == 'nuevo') {    

    $extra1 = $_POST['extra1'];
    $extra2 = $_POST['extra2'];
    $extra3 = $_POST['extra3'];
    $pho = $_POST['phone'];
    $email_buyer = $_POST['email_buyer'];
    $ip = $_POST['ip'];
    $reference_pol = $_POST['reference_pol'];
    $reference_sale = $_POST['reference_sale'];
    $transaction_id = $_POST['transaction_id'];
    $transaction_date = $_POST['transaction_date'];

    echo $extra1 . "<br>";
    echo $extra2 . "<br>";    
    echo $extra3 . "<br>"; // Null
    echo $pho . "<br>";
    echo $email_buyer . "<br>";
    echo $ip . "<br>";
    echo $reference_pol . "<br>";
    echo $reference_sale . "<br>";
    echo $transaction_id . "<br>";
    echo $transaction_date . "<br>";
}

// Eliminar Membresía

if ($_POST['registro'] == 'eliminar') {
    
    

}
