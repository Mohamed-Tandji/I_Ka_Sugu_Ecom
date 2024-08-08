<?php
$auth = new Auth();

 $panier = new Panier();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Vos balises meta, titre et autres éléments -->
    <style>

        .navbar {
            background-color: black;
            color: white;
            
        }

        .navbar-brand {
            background-image: url('medias\ressources\logo.png');
            background-size: contain;
            background-repeat: no-repeat;
            height: 40px;
            width: auto;
            padding-right: 40px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>I  Ka Sugu</title>
</head>
<body>
    <!-- Votre contenu HTML existant -->
    <header>
        <nav class="navbar navbar-expand-lg bg-light" style="--bs-scroll-height: 100px;" >
            <a class="navbar-brand" href="#">I Ka Sugu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= ROOTDOMAINE."produits/index"?>">Menu</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nos produits
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Laitier</a></li>
            <li><a class="dropdown-item" href="#">Legumes </a></li>
            <li><a class="dropdown-item" href="#">Fruits</a></li>
            <li><a class="dropdown-item" href="#">Boucherie </a></li>
            <li><a class="dropdown-item" href="#">Jus</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Tout </a></li>
          </ul>
        </li>
        <div class="d-flex">
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOTDOMAINE."auths/compte"?>"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg></a>
       </li>
       </div>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOTDOMAINE."paniers/index"?>">        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
          <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg><?= $panier->countPanier(); ?></a>
        </li>
       

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">rechercher</button>
      </form>
    </div>
  </div>       
 </nav>
    </header>

</body>
</html>




  