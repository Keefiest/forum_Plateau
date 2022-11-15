<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];
?>

<h1>Posts du Topic <?=$topic->getTitle()?></h1>

<?php
foreach($posts as $post){
    ?>
    <p>
            <?php echo $post->getMember()." (".$post->getPostDate().") à écrit : <br>".$post->getText()?>
    </p>
<?php
}

if($topic->getClosed() == 0){
?>
    <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="POST">
        <h2>+Post</h2>
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
} else{
    echo "<h3>Topic fermé</h3>";
}
?>

  
