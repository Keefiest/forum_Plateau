<?php

$topics = $result["data"]['topics'];
$category = $result["data"]['category'];

if(App\Session::getMember()->getBanned() == 0){
?>

<h1>Topics de la catégorie <?=$category ?></h1>

<div class="list">
    <div class="topics">
<?php    
foreach($topics as $topic){
    //var_dump($topic);
    // var_dump($topic->getId()); die;
    ?>
        <div class="topic">
            <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                <?php echo $topic->getTitle()." - ".$topic->getcreationDate()."";
                if($topic->getClosed() == 1){
                    echo "(Fermé)";
                } else{
                    echo "(Ouvert)";
                }
                ?>
            </a>
        
            <div class="delTopic">
                    <?php
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $topic->getMember()->getId() or App\Session::isAdmin()){
                        ?>
                        <a href="javascript:;" onclick="document.getElementById('pageEditTopic').submit();">Modifier</a>
                        <a href="javascript:;" onclick="document.getElementById('delTopic').submit();">Supprimer</a>
                        <form id="delTopic" action="index.php?ctrl=forum&action=delTopic&id=<?= $topic->getId()?>" method="POST">
                            <input type="hidden" name="delTopic" value="supprimer">
                        </form>
                    <?php
                    }
                    ?>
            </div>
                <?php
                    if($memberId == $topic->getMember()->getId() or App\Session::isAdmin()){
                        ?> 
                        <form id="pageEditTopic" action="index.php?ctrl=forum&action=pageEditTopic&id=<?= $topic->getId()?>" method="POST">
                            <input type="hidden" name="pageEditTopic" value="modifier">
                        </form>
                        <?php
                    }
                    ?>
        </div>
        <?php
        }  
        ?>
        </div>
    </div>
    <?php
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
} else{
    echo "<h2>Vous êtes banni</h2>";
}


  
