<nav class="navbar navbar-expand-lg text-white navbar-light bg-primary mb-4">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a href="index">
    <img src="images/logo_transparent.png" alt="logo gezondsheidmeter" class="ms-2 w-75" height="60px">
    </a>

    <ul class="navbar-nav mr-auto m-1">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="dashboard">Dashboard</a>
      </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="vragenlijst">Vragenlijst</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto m-1">

      <?php 
        //Checkt of de session al gestart is
        if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
          session_start();
        }

        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == 0) {
          echo '
          <li class="nav-item active">
            <a class="nav-link text-white" href="login">Inloggen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="register">Aanmelden</a>
          </li>';
        } else if ($_SESSION['loggedIn'] == 1) {
          echo '<li class="nav-item">
            <a class="nav-link text-white mx-3" href="login">Uitloggen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-bold mx-3" href="profile">'.$_SESSION['name'].'</a>
          </li>';
        }
      ?>

    </ul>
  </div>
</nav>