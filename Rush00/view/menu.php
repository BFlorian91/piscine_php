<?php
    session_start();
    require_once 'head.php';
?>
    <header>
        <h1>AchetesUnEtudiant.com</h1>
        <nav>
            <ul class="nav">
                <li>
                    <a class="menu_link active" href="../index.php">Accueil</a>
                </li>
                <li>
                    <?php if (!$_SESSION['loggued_on_user']): ?>
                        <a class="menu_link" href="/view/login.php">Se Connecter</a>
                </li>
                <li>
                        <a class="menu_link" href="/view/create.php">S'inscrire</a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($_SESSION['loggued_on_user'] === 'admin'): ?>
                        <a class="menu_link" href="/view/admin.php">Admin</a> 
                    <?php endif; ?>
                </li>
                <li>
                <?php if ($_SESSION['loggued_on_user']): ?>
                    <a class="menu_link" href="/view/modif.php">Gérer son compte</a>
                </li>
                <li>
                    <a class="menu_link" href="/model/action_logout.php">Déconnexion</a>
                <?php endif; ?>
                </li>
                <li>
                    <a class="menu_link" href="/view/basket.php">Panier</a>
                </li>
                </ul>
        </nav>
    </header>

