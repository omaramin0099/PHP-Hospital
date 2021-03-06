
<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/hospital/index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php  if (isset($_SESSION['admin'])) {?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/doctors/addDoctors.php">Add Doctor</a>
          <a class="dropdown-item" href="/hospital/doctors/listDoctors.php">Doctors List</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fields
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/Fields/addField.php">Add Field</a>
          <a class="dropdown-item" href="/hospital/Fields/listFields.php">Fields List</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      
    </ul>

    <form action="">
      <button class="btn btn-outline-danger my-2 my-sm-0 mx-1" name="logout" type="submit">Logout</button>
    </form>
    <?php 
      }
      else {?>
    <a href="/hospital/admin/admin.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button></a>
        <?php } ?>
  </div>
</nav>