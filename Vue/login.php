<section>
    <h2>Authentifiez-vous pour accéder au contenu : </h2>
    <form action="index.php?page=form_login" method="post">
        <label>Entrez votre pseudo : </label>
        <input type="text" id="input_text_pseudo" name="input_text_pseudo">
        <label>Entrez votre mot de passe : </label>
        <input type="password" id="input_password_mdp" name="input_password_mdp">
        <button type="submit" id="input_button_submit" name="input_button_submit" value="Envoyer">Envoyer</button>
        <p class="erreur"><?php if(isset($message_erreur)) echo $message_erreur ?></p>
    </form>

</section>
