<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Injection SQL</title>
</head>
<body>
    <header>
        <h1>Mon p'ti blog</h1>
    </header>
    <nav>

    </nav>
    <section>
        <h2>Authentifiez-vous pour accéder au contenu : </h2>
        <form action="traitement.php" method="post">
            <label>Entrez votre pseudo : </label>
            <input type="text" name="inputtextpseudo">
            <label>Entrez votre mot de passe : </label>
            <input type="password" name="inputpasswordmdp">
            <button type="submit" name="buttonsubmit">Envoyer</button>
        </form>
    </section>
    <footer>
        <p>@ BTS CIEL IR : Design for testing SQL Injection.</p>
    </footer>
    <script src="login.js"></script>
</body>
</html>