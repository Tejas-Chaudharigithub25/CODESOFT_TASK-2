<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Development</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<section>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="index.php">
      <img class="m-2 rounded" width="50px" src="alogo.png" alt="adminimg">
          Book my - <span class="fw-bold" style=" color: rgb(182, 95, 240);">Trip</span> Admin
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-white"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav p-2">
      <li class="nav-item">
        <a href="index.php" class="nav-link text-white" aria-current="page">
          Home
        </a>
      </li>
      <li class="nav-item">
        <a href="Acity.php" class="nav-link text-white">
          City Manager
        </a>
      </li>
      <li class="nav-item">
        <a href="Airlines.php" class="nav-link text-white">
          Airlines Manager
        </a>
      </li>
      <li class="nav-item">
        <a href="Aflight.php" class="nav-link text-white">
          Flight Manager
        </a>
      </li>
      
      <li class="nav-item">
        <button onclick="con()" class="nav-link btn-success text-center text-white">
          Sign-Out
        </button>
      </li>
    </ul>
    </div>
  </div>
</nav>
</section>
<script>
  function con(){
    
      window.location.assign("profile.php");
    
  }
</script>