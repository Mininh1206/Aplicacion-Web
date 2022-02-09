<nav class="top-bar topbar-responsive">
  <div class="top-bar-title">
    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <a class="topbar-responsive-logo" href="index.php"><strong>Proyecto pingüino</strong></a>
  </div>
  <div id="topbar-responsive" class="topbar-responsive-links">
    <div class="top-bar-right">
      <ul class="menu simple vertical medium-horizontal" data-responsive-menu="accordion medium-dropdown">
        <li></li>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="suscripcion.php">Suscripciones</a></li>
        <?php
        if ($_SESSION['IdSus']==-1 || $_SESSION['IdSus']>0){
          echo "<li><a href='ventajas.php'>Ventajas</a></li>";
        }
        ?>
        <li>
          <?php echo $_SESSION["Nombre"] ?>
          <img class="avatar-user" src ="data:image/*;base64, <?php echo base64_encode($_SESSION['Avatar']); ?>">
          <ul class="vertical menu" >
            <li><a href="functions/exit.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

