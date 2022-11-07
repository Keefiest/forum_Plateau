<?php

$posts = $result["data"]['posts'];

?>

<h1>Posts du Topic</h1>

<?php
foreach($posts as $post){
    ?>
    <p>
            <?php echo $post->getMember()." (".$post->getPostDate().") à écrit : <br>".$post->getText()?>
    </p>
    <?php
}



  
