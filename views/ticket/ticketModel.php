<?php
// Agregar Nuevo Ticket

if ($_POST['registro'] == 'nuevo') {

    $respuesta = "";
    $ticketNumber = $_POST['ticketNumber'];
    $clientName = $_POST['clientName'];
    $clientCC = $_POST['clientCC'];
    $clientCel = $_POST['clientCel'];
    $clientEmail = $_POST['clientEmail'];
    $idTransaction = $_POST['idTransaction'];
    $codReference = $_POST['codReference'];

    $ticketNumber = substr(strval(intval($ticketNumber) + 10000), 1);

    include_once "../../connection/connection.php";
    $conn = mysqli_connect($host, $user, $pw, $db);
    $sql = "SELECT numero_boleta FROM boletas WHERE numero_boleta = $ticketNumber";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $respuesta = "error";
    } else {

        $sql = "INSERT INTO boletas (numero_boleta, comprador_nombre, comprador_cedula, comprador_celular, comprador_correo, id_transaccion, codigo_referido) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $ticketNumber, $clientName, $clientCC, $clientCel, $clientEmail, $idTransaction, $codReference);
        $stmt->execute();
        $registros = $stmt->affected_rows;
        $stmt->close();

        if ($registros > 0) {
            $respuesta = "exito";
        } else {
            $respuesta = "error";
        }
    }

    $dataAjax = [
        "respuesta" => $respuesta
    ];

    die(json_encode($dataAjax));
}

// Eliminar Ticket

if ($_POST['registro'] == 'eliminar') {

    $id_borrar = $_POST['id'];
    $respuesta = "";

    try {

        include_once "../../connection/connection.php";
        $conn = mysqli_connect($host, $user, $pw, $db);
        $stmt = $conn->prepare('DELETE FROM boletas WHERE id = ?');
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();

        if ($stmt->affected_rows) {
            $dataAjax["id_eliminado"] = $id_borrar;
            $respuesta = "exito";
        } else {
            $respuesta = "error";
        }
    } catch (Exception $e) {
        $respuesta = $e->getMessage();
    }

    $dataAjax["respuesta"] = $respuesta;

    die(json_encode($respuesta));
}
