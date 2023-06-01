<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role']!=='admin') {
    header("Location: ../connexion.php");
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            padding: 0 20px;
            margin-bottom: 60px;
        }
        .manage{
            justify-content: end;
        }
        .search,.manage{
            margin-top: 60px;
            display: flex;
            /* justify-content: space-between; */
            column-gap: 20px;
        }
        .search img,.manage img{
            width: 300px;
            height: auto;
            object-fit: cover;
        }
        .search .text-content,.manage .text-content{
            max-width: 400px;
        }
        .search a,.manage a{
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #0083c5ca;
        }
    </style>
    <title>Admin</title>
</head>
<body>
    <?php require_once __DIR__. '/../components/header.php' ?>
    <div class="container">
        <div class="search">
            <img src="../assets/pexels-pixabay-220326.jpg" alt="">
            <div class="text-content">
                <h1>voir les cahier</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat dolores magni! Fuga ex possimus commodi, quia quos aliquam fugiat alias qui illo fugit, sequi numquam, ipsam non eos excepturi.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti eum obcaecati necessitatibus architecto inventore qui quas sint libero eius quo ipsam possimus, consequatur eveniet modi sequi labore animi laborum recusandae!</p>
                <a href="./search-teacher.php">voir ➡</a>
            </div>
        </div>
        <div class="manage">
            <div class="text-content">
                <h1>Ajouter des donnée</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat dolores magni! Fuga ex possimus commodi, quia quos aliquam fugiat alias qui illo fugit, sequi numquam, ipsam non eos excepturi.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti eum obcaecati necessitatibus architecto inventore qui quas sint libero eius quo ipsam possimus, consequatur eveniet modi sequi labore animi laborum recusandae!</p>
                <a href="./manage.php">Ajouter ➡</a>
            </div>
            <img src="../assets/pexels-pixabay-256161.jpg" alt="">
        </div>
    </div>
</body>
</html>