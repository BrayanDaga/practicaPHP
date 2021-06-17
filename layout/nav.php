<div class="container">
    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
        &#x2630;</button> <a class="navbar-brand d-block d-sm-none-block d-none d-sm-block d-md-none-block" href="">Inicio</a>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav ">

            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <li class="active nav-item"><a href="logout.php" class="nav-link">Cerrar Sesion</a>
                </li>
            <?php
            }
            ?>


        </ul>
    </div>
    <!--/.nav-collapse -->
</div>