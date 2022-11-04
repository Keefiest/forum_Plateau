<?php

$categories = $result["data"]['categories'];
    
?>

<h1>Categories :</h1>

<?php
foreach($categories as $category){

    ?>
    <p> 
        <a href="index.php?ctrl=forum&action=listTopics&id=<?=$category->getId()?>">
            <?=$category->getnameCategory()?>
        </a>
    </p>
    <?php
}


  
