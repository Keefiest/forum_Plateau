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
             ?>
    </p>

    <?php
}
?>


  
