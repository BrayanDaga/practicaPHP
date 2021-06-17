<div class="container">
    <br>
    <br>
    <br>

    <div class="row">
        <h2>Lista de usuarios</h2>
    </div>

    <button class="btn btn-sm btn-primary" id="BotonAgregar">Agregar user</button>
    <br>
    <br />

    <div class="table-responsive">

        <table class="table table-striped table-hover" id="tablaUsers">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <td>Modificar</td>
                    <td>Borrar</td>
                </tr>
            </thead>
        </table>
    </div>
</div>

<?php include_once('layout/modal.html'); ?>
<center>
    <p>&copy; Sistemas Web <?php echo date("Y"); ?></p>
</center>

<link href="datatables/datatables.min.css" rel="stylesheet">

<script src="datatables/datatables.min.js"></script>
<script src="js/main.js"> </script>