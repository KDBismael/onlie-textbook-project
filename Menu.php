<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role']!=='teacher') {
  header("Location: ./connexion.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menu de Connexion</title>
  </head>
  <body>
    <div class="container">
      <?php require_once './components/header.php' ?>
      <div class="banner">
        <img src="./assets/slide_1.png" alt="Advertisement">
      </div>
      <div class="last">
        <h1>Voici votre cahier de texte <span>en ligne</span></h1>
        <div class="arrow-c">
            <a href="./TableauSaisir.php" class="Arrow">
              <img src="./assets/arrow-right-solid.svg" alt="">
            </a>
          </div>
      </div>
    </div>
    <!-- <div class="login-menu">
      <h1>Menu de Connexion</h1>
      <button onclick="window.location.href='formulairedecours.html'">Saisir des Cours</button>
      <button onclick="window.location.href='TableauSaisir.html'">Mes Enseignants</button>
    </div> -->
  </body>
</html>
<style>
  .arrow-c{
    display: flex;
    justify-content: end;
    margin: 0 15px;
  }
  .Arrow{
    padding: 0px 20px;
    background-color: #0083c5;
    text-decoration: none;
  }
  .Arrow img{
    width: 25px;
    object-fit: cover;
    height: auto;
    fill: white;
  }
  .last h1 span{
    color: #0083c5;
  }
  .last h1{
    margin-top: 20px;
    font-size: 60px;
    font-weight: bold;
    text-align: right;
  }
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
.banner img {
  width: 100%;
  /* height: 200px; */
  object-fit: cover;
}
</style>
