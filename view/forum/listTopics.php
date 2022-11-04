<?php

$topics = $result["data"]['topics'];
$category = $result["data"]['category'];

?>

<h1>Topics de la catégorie <?=$category ?></h1>

<?php
foreach($topics as $topic){

    ?>
    <p>
        <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>">
            <?php echo $topic->getTitle()." - ".$topic->getcreationDate().""?>
        </a>
    </p>
    <?php
}


  
