<?php

$topics = $result["data"]['topics'];
$categories = $result["data"]['categories'];

?>

<h1>Topics de la catégorie <?=$categories->getnameCategory()?></h1>

<?php
foreach($topics as $topic){

    ?>
    <p>
        <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>">
            <?=$topic->getTitle()?>
        </a>
    </p>
    <?php
}


  
