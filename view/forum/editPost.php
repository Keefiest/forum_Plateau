<?php
$post = $result["data"]['post'];
if(App\Session::getMember()->getBanned() == 0){
?>
            <div class="editPost">
                <?php
                echo 'Modifier "'.$post->getText().'"';
                $memberId = $_SESSION['member']->getId();
                if($memberId == $post->getMember()->getId() or App\Session::isAdmin()){
                ?>
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
<?php
}
?>