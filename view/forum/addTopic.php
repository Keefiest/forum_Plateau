<?php
$categories = $result["data"]['categories'];
?>
<form action="" method="POST">
    <h2>+Topic</h2>
    <p>
        <label>
            Titre</br>
            <input type="text" name="title" required="required">
        </label>
    </p>
    <p>
        <label>
            Categorie</br>
            <select name="category" required="required">
                <?php
                    echo "<option value='default'> Par défaut </option>"
                    foreach($categories AS $category){
                        echo "<option value=".$category['id'].">".$category['nameCategory']."</option>";
                    }
                ?>
            </select>
        </label>
    </p>
    <p>
        <label>
            Membre</br>
            <input type="number" name="member" required="required">
        </label>
    </p>
</form>