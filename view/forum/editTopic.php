<?php
$topic = $result["data"]['topic'];
if(App\Session::getMember()->getBanned() == 0){
?>

        <div class="editTopic">
                <?php
                echo "Modifier ".$topic->getTitle();
                $memberId = $_SESSION['member']->getId();
                if($memberId == $topic->getMember()->getId() or App\Session::isAdmin()){
                    ?> 
                    <form action="index.php?ctrl=forum&action=editTopic&id=<?= $topic->getId()?>" method="POST">
                        <p> 
                            <label>
                                Nouveau titre</br>
                                <input type="text" name="title" required="required">
                            </label>
                        </p>
                        <input type="submit" name="editTopic" value="modifier">
                    </form>
                <?php
                }
                ?>
        </div>
<?php
}
?>