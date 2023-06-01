<?php define('ROOT_PATH', '/projet cahier de texte en ligne');?>
<?php 
    include 'C:\PHP\htdocs\projet cahier de texte en ligne\helpers\util_func.php';
    if (isset($_POST['logout']) && $_POST['logout'] === 'true') {
        util::logout();
        exit();
    }
?>
<header>
    <div class="logo">
        <a style="width: 100%;height: 100%; display:inline-block;" href="\projet cahier de texte en ligne\index.html">
            <img src="<?php echo ROOT_PATH;?>/assets/Logo-ESATIC.png" alt="Logo">
        </a>
    </div>
    <nav>
        <ul>
        <li><a href="../index.html">Accueil</a></li>
        <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'teacher'):?>
            <li><a href="<?php echo ROOT_PATH;?>/TableauSaisir.php">Saisir cours</a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'admin'):?>
            <li><a href="../admins/manage.php">Manage</a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li><a href="../admins/search-teacher.php">Search</a></li>
        <?php endif ?>
        <li><a href="#">Vacation</a></li>
        <li><a href="#">Requete</a></li>
        <li>
            <a>
                <form style="display: inline-block;color: white;" id="logoutForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><input type="hidden" name="logout" value="true"><button style="  border: none;background-color: transparent;color: white;" type="submit">Logout</button></form>
            </a>
        </li>
        </ul>
    </nav>
    <div class="profile">
        <img src="<?php echo ROOT_PATH;?>/assets/pngegg.png" alt="Profile Photo">
    </div>
</header>

<style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #f2f2f2;
    }

    .logo img {
        height: 50px;
    }

    nav ul {
        list-style: none;
        display: flex;
    }

    nav ul li {
        margin-right: 10px;
    }

    nav ul li a {
        text-decoration: none;
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: #0083c5ca;
    }
    nav ul li a:hover{
        background-color: #0083c5;
    }
    .profile img {
        height: 50px;
        border-radius: 50%;
    }
</style>