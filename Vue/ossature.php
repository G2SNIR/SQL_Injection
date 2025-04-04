<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Vue/style.css">
    <title>Injection SQL</title>
</head>
<body>
    <header>
        <h1>Mon p'ti blog</h1>
    </header>
    <nav>
        <?php if(isset($_SESSION["pseudo"])) { ?>
        <div class="menu"><a href="index.php?page=blog">Blog Node JS</a></div>
        <div class="menu"><a href="index.php?page=mvc">MVC</a></div>
        <?php } ?>
        <div class="menu" id="div_pseudo"><?php if(isset($_SESSION["pseudo"])) echo $_SESSION["pseudo"]; ?></div>
        <div class="menu" id="div_deconnexion"><a href="index.php?page=logout"><?php if(isset($_SESSION["pseudo"])) echo "Se déconnecter"; ?></a></div>
    </nav>
    <section>
        <?php include($section_principale); ?>
    </section>
    <footer>
        <p>@ BTS CIEL IR : Design for testing SQL Injections and XSS Attacks.</p>
    </footer>
</body>
</html>