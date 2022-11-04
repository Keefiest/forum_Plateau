<?php

$posts = $result["data"]['posts'];


?>

<h1>Posts du Topic</h1>

<?php
foreach($posts as $post){

    ?>
    <p>
            <?=$post->getText()?>
    </p>
    <?php
}


  
