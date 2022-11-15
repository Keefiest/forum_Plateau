<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\MemberManager;
    use Model\Managers\PostManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{
        
        public function index(){

        }
        public function register(){
            if(isset($_POST['submit'])){
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $confirmPassword filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $rank = "membre";
                $phoneNumber = 555444;
                
                if($username && $username && $password){
                    
                    $memberManager = new MemberManager();
                    // On vérifie que le pseudo et l'adresse email n'existe pas en base de donnée, et que le mot de passe est pareil que la confirmation
                    if(!$memberManager->finOneByUser($username) && !$memberManager->findOneByEmail($email) && ($password == $confirmPassword)){
                        $memberManager->add([
                            "username" => $username,
                            "email" => $email,
                            "password" => password_hash($password, PASSWORD_DEFAULT),
                            "rank" => $rank
                            "phoneNumber" => $phoneNumber
                        ])
                    }
                }
                return ["view" => VIEW_DIR . "/security/register.php"];  
            }
           
        }
    }


?>