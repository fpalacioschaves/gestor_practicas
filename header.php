<header class="navbar-light bg-light">
    <div class="navegacion">
        <ul class="menu_superior">
            <li><a href="admin.php"><i class="fa-solid fa-toolbox"></i> Panel</a></li>

            <li><a href="empresas.php"><i class="fa-solid fa-building"></i>Empresas</a></li>

            <li><a href="alumnos.php"><i class="fa-solid fa-school"></i></i>Alumnos</a></li>

            <li><a href="logout.php"><i class="fa-solid fa-clipboard-question"></i></i>Logout</a></li>
        </ul>
    </div>
    <div class="informacion">
        <span> Bienvenido, <?php echo $_SESSION["usuario"]; ?> </span>

    </div>



    <!-- Menu  -->
</header>