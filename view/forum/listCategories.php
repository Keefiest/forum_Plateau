<?php

$categories = $result["data"]['categories'];
if(App\Session::getMember()->getBanned() == 0){
?>

<h1>Categories :</h1>

<?php
    foreach($categories as $category){
    ?>
        <p> 
            <a href="index.php?ctrl=forum&action=listTopics&id=<?=$category->getId()?>">
                <?= $category ?>
            </a>
        </p>
    <?php
    }
} else{
    echo "<h2>Vous êtes banni</h2>";
}
?>


  
