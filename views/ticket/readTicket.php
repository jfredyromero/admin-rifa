<?php
include_once("../../templates/header.php");
include_once("../../templates/navbar.php");
include_once("../../templates/menu.php");
include_once("../../connection/connection.php");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista Boletas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gestion de membresias </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Id transaccion</th>
                                    <th>C.Referido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    //code...
                                    $conn = mysqli_connect($host, $user, $pw, $db);
                                    $sql = "SELECT id, numero_boleta, comprador_nombre, comprador_cedula, comprador_celular, comprador_correo, id_transaccion, codigo_referido FROM boletas";
                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    //throw $th;
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                while ($registro = $resultado->fetch_assoc()) { ?>

                                    <tr>
                                        <td> <?php echo $registro['numero_boleta']; ?> </td>
                                        <td> <?php echo $registro['comprador_nombre']; ?> </td>
                                        <td> <?php echo $registro['comprador_cedula']; ?> </td>
                                        <td> <?php echo $registro['comprador_celular']; ?> </td>
                                        <td> <?php echo $registro['comprador_correo']; ?> </td>
                                        <td> <?php echo $registro['id_transaccion']; ?> </td>
                                        <td> <?php echo $registro['codigo_referido']; ?> </td>
                                        <td>
                                            <a href="updateTicket.php?id=<?php echo $registro['id']; ?>" class="btn bg-primary btn-flat rounded margin">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="#" data-id="<?php echo $registro['id']; ?>" data-tipo="boleta" class="btn bg-maroon btn-flat margin rounded borrar_registro">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Número</th>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Id transaccion</th>
                                    <th>C.Referido</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


</div>


<?php
include_once("../../templates/footer.php");
?>