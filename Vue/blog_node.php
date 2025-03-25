    <section>
        <h1>Comment installer Node JS sur Windows</h1>
        <h2>Téléchargement de Node JS</h2>
        <p>Vous trouverez <a href="https://nodejs.org/en/download">ici</a> le lien de téléchargement.</p>
        <h2>Ajout de Node dans le PATH</h2>
        <p>Il est nécessaire d'ajouter le chemin d'installation de Node JS dans la variable d'environnement $PATH.</p>
        <h2>Tests</h2>
        <p>Ouvre un fichier hello-world.js dans ton éditeur préféré et colle le code suivant : </p>
        <pre><code>
    const http = require('node:http');
    const hostname = '127.0.0.1';
    const port = 3000;

    const server = http.createServer((req, res) => {
        res.statusCode = 200;
        res.setHeader('Content-Type', 'text/plain');
        res.end('Hello, World!\n');
    });

    server.listen(port, hostname, () => {
        console.log(`Server running at http://${hostname}:${port}/`);
    }); 
        </code></pre>
        <p>Sauvegarde le fichier et dans un terminal, exécute ce script en tapant :</p>
        <code><pre>
    node hello-world.js
        </pre></code>
        <h1>Vos commentaires sur mon tuto : </h1>

        <?php 
            foreach($lescommentaires["commentaire"] as $uncommentaire)
            {
                echo  "<p>Le ". $uncommentaire["date"] . ", <b>" . $uncommentaire["pseudo"] . "</b> a écrit : </p>";
                echo  "<p class=\"commentaire\">" . $uncommentaire["commentaire"] . "</p><p></p>";
            }
        ?>
        <h2 id="h2_form">Lancez-vous, postez votre commentaire : </h2>
        <form action="index.php?page=form_blog" method="post">
            <label>Entrez votre pseudo : </label>
            <input type="text" name="input_text_pseudo">
            <label>Entrez votre commentaire : </label>
            <textarea name="input_text_commentaire" rows="4"></textarea>
            <button type="submit" name="button_submit">Envoyer</button>
        </form>

    </section>
