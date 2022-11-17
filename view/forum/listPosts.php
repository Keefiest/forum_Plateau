<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];
?>
<h1>Posts du Topic <?=$topic->getTitle()?></h1>

<?php
if(App\Session::getMember()->getId() == $topic->getMember()->getId() or App\Session::isAdmin()){
    if($topic->getClosed() == 0){
?> 
    <form id="lTopic" action="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId()?>" method="POST">
        <button type="submit" name="lockTopic" value="Vérouiller Topic">Vérouiller Topic</button>
    </form>
<?php
    }
    else{
        ?>
        <form id="ulTopic" action="index.php?ctrl=forum&action=unlockTopic&id=<?= $topic->getId()?>" method="POST">
            <button type="submit" name="unlockTopic" value="Déverouiller Topic">Déverouiller Topic</button>
        </form>
        <?php
    }
}
else{
    echo "<h3>Par ".$topic->getMember()."</h3>";
}
foreach($posts as $post){
    ?>
    <p>
            <?php echo $post->getMember()." (".$post->getPostDate().") à écrit : <br>".$post->getText()?>
            <?php
                $memberId = $_SESSION['member']->getId();
                if($memberId == $post->getMember()->getId() or App\Session::isAdmin()){
                    ?>
                    <form id="delPost" action="index.php?ctrl=forum&action=delPost&id=<?= $post->getId()?>" method="POST">
                        <input type="submit" name="delPost" value="supprimer">
                    </form>
                    <form action="">
                        <input type="submit" name="editPost" value="Modifier">
                    </form>
            <?php
                }
            ?>
    </p>
<?php
}
if(App\Session::getMember()){
    if($topic->getClosed() == 0){
    ?>
        <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="POST">
            <h2>Ajouter Post</h2>
            <p>
                <label>
                    Message</br>
                    <textarea name="text" cols="30" rows="10"></textarea>
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
        echo "<h3>Topic fermé</h3>";
    }
}
else{
    echo "<h3>Connectez-vous pour poster</h3>";
}
if(isset($_POST['editPost'])){
    ?>
    <form action="index.php?ctrl=forum&action=editPost&id=<?= $topic->getId() ?>" method="POST">
            <h2>Modifier un Post</h2>
            <p>
                <label>
                    Message</br>
                    <textarea name="text" cols="30" rows="10"></textarea>
                </label>
            </p>
            <p>
                <label>
                    <input type="submit" value="Modifier" name="submit">
                </label>
            </p>    
        </form>
<?php
}
?>

  
