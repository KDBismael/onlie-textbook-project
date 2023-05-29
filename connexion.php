<?php
include './helpers/connexion.php';
session_start();

if (isset($_SESSION['role'])&&$_SESSION['role']=='teacher') {
    header("Location: ./Menu.php");
    exit();
}
if (isset($_SESSION['role'])&&$_SESSION['role']=='admin') {
    header("Location: ./admins/adminTable.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $connexion=new connexion($name,$password);
    $connexion->connect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>connexion</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;margin-bottom:40px; margin-top:20px;">Connexion</h1>
        <div class="connexion">
            <form method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Nom d'utilisateur:</label>
                <input type="text" id="name" name="name" required />
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required />
                <div class="buttons">
                    <button type="submit">Se connecter</button>
                    <button type="reset">Annuler</button>
                </div>
                <p>Mot de passe oublié?</p>
            </form>
            <?php if (isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>