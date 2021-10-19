<?php

    // Eliminar Ticket

    if ($_POST['registro'] == 'eliminar') {

        $id_borrar = $_POST['id'];
    
        try {
    
            include_once "../../connection/connection.php";
            $conn = mysqli_connect($host, $user, $pw, $db);
            $stmt = $conn->prepare('DELETE FROM boletas WHERE id = ?');
            $stmt->bind_param("i", $id_borrar);
            $stmt->execute();
    
            if ($stmt->affected_rows) {
                # code...
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } catch (Exception $e) {
    
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    
        die(json_encode($respuesta));
    }

?>