<?php

$members = $result["data"]['members'];
    
?>

<h1>Membres :</h1>
<?php
?>

<?php
foreach($members as $member){


    ?>
    <p>
            <?php
                echo "Pseudo : ".$member->getUsername()." / Email : ".$member->getEmail()." / ";
                if($member->getRank() == "admin"){
                    echo "<span style='color:red;font-weight:bold;'>".$member->getRank()."</span>";
                } else{
                    echo $member->getRank();
                }
                if($member->getBanned() == 1){
            ?>
                <form action="index.php?ctrl=security&action=unban&id=<?= $member->getId()?>" method="POST">
                    <input type="submit" name="unban" value="Débannir">    
                </form>
                
            <?php
                } elseif($member->getBanned() == 0){
            ?>
                <form action="index.php?ctrl=security&action=ban&id=<?= $member->getId()?>" method="POST">
                    <input type="submit" name="ban" value="Bannir">    
                </form>
            <?php
                }
             ?>
    </p>

    <?php
}
?>


  
