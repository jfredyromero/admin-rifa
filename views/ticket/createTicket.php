<?php
include_once("../../templates/header.php");
include_once("../../templates/navbar.php");
include_once("../../templates/menu.php");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Membresía</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar membresía</h3>
            </div>
            <div class="card-body">
                <form role="form" enctype="multipart/form-data" name="createTicket" id="createTicket" method="post" action="ticketModel.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usuario">Número Membresía</label>
                            <input type="text" class="form-control" id="ticketNumber" name="ticketNumber" placeholder="Ingresa el número de la membresía" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Comprador</label>
                            <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Cédula Comprador</label>
                            <input type="text" class="form-control" id="clientCC" name="clientCC" placeholder="Ingresa la cédula" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Celular Comprador</label>
                            <input type="text" class="form-control" id="clientCel" name="clientCel" placeholder="Ingresa el celular" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Correo Comprador</label>
                            <input type="email" class="form-control" id="clientEmail" name="clientEmail" placeholder="Ingresa el email" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">ID Transaccion</label>
                            <input type="text" class="form-control" id="idTransaction" name="idTransaction" placeholder="Ingresa el ID de la transacción" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Código Referido</label>
                            <input type="text" class="form-control" id="codReference" name="codReference" placeholder="Ingresa el código de referido" required>
                        </div>
 
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /. Main content -->

</div>


<?php
include_once("../../templates/footer.php");
?>