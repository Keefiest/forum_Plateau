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

        public function pageRegisterLogin(){
            return [
                "view" => VIEW_DIR."security/register-login.php"
            ];

        }

        public function register(){
            if(isset($_POST['submit'])){
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $verifyPassword = filter_input(INPUT_POST, "verifyPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $rank = "membre";
                $phoneNumber = 555444;
                
                if($username && $username && $password){
                    
                    $memberManager = new MemberManager();
                    // On vérifie que le pseudo et l'adresse email n'existe pas en base de donnée, et que le mot de passe est pareil que la confirmation
                    if(!$memberManager->findOneByUser($username) && !$memberManager->findOneByEmail($email) && ($password == $verifyPassword)){
                        $memberManager->add([
                            "username" => $username,
                            "email" => $email,
                            "password" => password_hash($password, PASSWORD_DEFAULT),
                            "rank" => $rank,
                            "phoneNumber" => $phoneNumber
                        ]);
                    }
                }
                return [
                    "view" => VIEW_DIR."security/register-login.php"
                ];
            }
        }
        public function login(){
            if(isset($_POST['submit'])){
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($email && $password){
                    $memberManager = new Membermanager();
                    // On vérifie que l'email existe en base de donnée et que le mot de passe est correct
                    if($memberManager->findOneByEmail($email)){
                        $hashpassWord = $memberManager->getPassword();
                        if(password_verify($password, $passwordHash)){
                            $memberManager->setMember($memberManager);
                        }
                    }
                
                }
                return [
                    "view" => VIEW_DIR."index.php"
                ];
            }
        }
    }


?>