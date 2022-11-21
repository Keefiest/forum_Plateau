<?php

$categories = $result["data"]['categories'];
if(App\Session::getMember()->getBanned() == 0){
?>

<div class="listCategories">
<h1>Categories :</h1>

    <div class="categories">
        <?php    
            foreach($categories as $category){
            ?>
                <div class="category">
                    <p> 
                        <a href="index.php?ctrl=forum&action=listTopics&id=<?=$category->getId()?>">
                            <?= $category ?>
                        </a>
                    </p>
                </div>
            <?php
            }
        } else{
            echo "<h2>Vous êtes banni</h2>";
        }
        ?>  
    </div>
</div>


  
