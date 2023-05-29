<header>
    <div class="logo">
        <img src="../assets/Logo-ESATIC.png" alt="Logo">
    </div>
    <nav>
        <ul>
        <li><a href="../index.html">Accueil</a></li>
        <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'teacher'):?>
            <li><a href="../TableauSaisir.php">Saisir cours</a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'admin'):?>
            <li><a href="../admins/manage.php">Manage</a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li><a href="../admins/search-teacher.php">Search</a></li>
        <?php endif ?>
        <li><a href="#">Vacation</a></li>
        <li><a href="#">Requete</a></li>
        <li><a href="#">Evalution</a></li>
        </ul>
    </nav>
    <div class="profile">
        <img src="../assets/pngegg.png" alt="Profile Photo">
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