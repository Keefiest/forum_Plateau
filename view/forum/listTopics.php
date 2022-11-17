<?php

$topics = $result["data"]['topics'];
$category = $result["data"]['category'];

?>

<h1>Topics de la catégorie <?=$category ?></h1>

<?php
foreach($topics as $topic){
    //var_dump($topic);
    // var_dump($topic->getId()); die;
    ?>
    <p>
        <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
            <?php echo $topic->getTitle()." - ".$topic->getcreationDate().""?>
        </a>
        <?php
        $memberId = $_SESSION['member']->getId();
        if($memberId == $topic->getMember()->getId() or App\Session::isAdmin()){
            ?>
            <form id="delPost" action="index.php?ctrl=forum&action=delTopic&id=<?= $topic->getId()?>" method="POST">
                <input type="submit" name="delTopic" value="supprimer un topic">
            </form>
        <?php
        }
        ?>

    </p>
    <?php
}

if(App\Session::getMember()){
?>
    <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="POST">
        <h2>+Topic</h2>
        <p> 
            <label>
                Titre</br>
                <input type="text" name="title" required="required">
            </label>
        </p>

        <p>
            <label>
                Message</br>
                <textarea name="text" cols="30" rows="10" required="required"></textarea>
            </label>
        </p>
        <p>
            <label>
                <input type="submit" value="Créer" name="submit">
            </label>
        </p>
    </form>
<?php
}
else{
    echo "<h3>Connectez-vous pour ajouter des topics</h3>";
}


  
