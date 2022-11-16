<div class="pageRegisterLogin">
    <form action="index.php?ctrl=security&action=register" method="POST">
        <h2>Inscription</h2>
        <p>
            <label>
                Pseudo</br>
                <input type="text" name="username" required="required">
            </label>
        </p>
        <p>
            <label>
                Adresse Email</br>
                <input type="text" name="email" required="required">
            </label>
        </p>
        <p>
            <label>
                Mot de passe</br>
                <input type="password" name="password" required="required">
            </label>
        </p>
        <p>
            <label>
                Confirmer mot de passe</br>
                <input type="password" name="confirmPassword" required="required">
            </label>
        </p>
        <p>
            <label>
                <input type="submit" value="Créer un compte" name="submit">
            </label>
        </p>    
    </form>

    <form action="index.php?ctrl=security&action=login" method="POST">
        <h2>Connexion</h2>
        <p>
            <label>
                Adresse Email</br>
                <input type="text" name="email" required="required">
            </label>
        </p>
        <p>
            <label>
                Mot de passe</br>
                <input type="password" name="password" required="required">
            </label>
        </p>
        <p>
            <label>
                <input type="submit" value="Se connecter" name="submit">
            </label>
        </p>    
    </form>
</div>