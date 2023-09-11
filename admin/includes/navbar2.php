<?php
include '../../admin/includes/header.php';
?>
<!---Navigation Starts	----->
<nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
  <div class="container">

    <!------Responsive Button---->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
        <i class="fa-solid fa-bars"></i>
      </button>
      <h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International School
      </h1>
    </div>
    <div class="collapse navbar-collapse" id="navi">

      <!------Navigation menus starts---->
      <ul class=" nav navbar-nav navbar-right" id="nav-ul">
        <li class="w100 nav-li"> <a href="../../index.php" class="border-bot nav-a">Home</a></li>
        <!--li class="w100 nav-li"> <a href="#our-members" class="border-bot nav-a">About</a></li-->
        <!--li> <a href="#myservice_section">Our Service</a></li>
              <li> <a href="#our-members">Team</a></li>
              <li> <a href="#myfaq">FAQs</a></li>
              <li> <a href="">Carrier</a></li-->

        <!-----dropdown start ---->
        <li class="w100 nav-li dropdown">
          <a class="w100 nav-li border-bot nav-a">menu</a>
          <div class="dropdown-content">
            <a class="w100 nav-li border-bot nav-a" href="../../sciencedemo.php">LESSON</a>
            <a class="w100 nav-li border-bot nav-a" href="../../online_quize/quizhome.php">EXERCISES</a>
          </div>
        </li>
        <!-----dropdown end ---->
        <?php
        if ($_SESSION['user']['user_type'] == 'user') {
          ?>
          <li class="w100 nav-li" id="resetpassbutton"> <a href="../../profile.php" class="border-bot nav-a">Setting</a></li>
        <?php
        } elseif ($_SESSION['user']['user_type'] == 'admin') {
          ?>
          <li class="w100 nav-li" id="resetpassbutton"> <a href="../../admin/admin_main.php" class="border-bot nav-a">Admin
              setting</a></li>
          <?php
        }
        ?>
        <li> <a href="../../logout.php" id="our-location" class="btn-success">
            <?php echo $_SESSION['user']['username']; ?>
          </a></li>
      </ul>
      <!------Navigation menus ends---->
    </div>
  </div>
</nav>
<!---Navigation Ends	----->







<!--
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  <a class="navbar-brand text-white" href="#">Jianne Therese International School</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu text-white" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> 
    </ul>
   <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> 
  </div>
</nav>-->