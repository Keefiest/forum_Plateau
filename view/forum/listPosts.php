<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];

if(App\Session::getMember()->getBanned() == 0){
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
            <div class="delPost">
                <?php
                $memberId = $_SESSION['member']->getId();
                if($memberId == $post->getMember()->getId() or App\Session::isAdmin()){
                        ?>
                    <form id="delPost" action="index.php?ctrl=forum&action=delPost&id=<?= $post->getId()?>" method="POST">
                        <input type="submit" name="delPost" value="supprimer">
                    </form>
                    <?php
                }
                ?>
            </div>
<?php
?>
            <div class="editPost">
                <?php
                if($memberId == $post->getMember()->getId() or App\Session::isAdmin()){
                ?>
                    Modifier</br>
                    <form action="index.php?ctrl=forum&action=editPost&id=<?= $post->getId()?>" method="POST">
                        <p> 
                            <label>
                                Nouveau message</br>
                                <input type="text" name="text" required="required">
                            </label>
                        </p>
                        <input type="submit" name="editPost" value="modifier">
                    </form>
                <?php
                }
                ?>
            </div>
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
} else{
    echo "<h2>Vous êtes banni</h2>";
}
?>

  
