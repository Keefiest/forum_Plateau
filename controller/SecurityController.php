<?php

    namespace Controller;

    use App\Session as session;
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
                $rank = "member";
                $phoneNumber = 555444;
                
                if($username && $email && $password && $verifyPassword){
                    $memberManager = new MemberManager();
                    // On vérifie que le pseudo et l'adresse email n'existe pas en base de donnée, et que le mot de passe est pareil que la confirmation
                    if(!$memberManager->findOneByUser($username)){
                        if(!$memberManager->findOneByEmail($email)){
                            if($password == $verifyPassword){
                                $memberManager->add([
                                    "username" => $username,
                                    "email" => $email,
                                    "password" => password_hash($password, PASSWORD_DEFAULT),
                                    "rank" => $rank,
                                    "phoneNumber" => $phoneNumber
                                ]);
                                session::addFlash("success", "Vous êtes inscrit avec succès");
                                $this->redirectTo("security", "pageRegisterLogin");
                            } else {
                                session::addFlash("error", "Le mot de passe ne correspond pas");
                            }
                        } else{
                            session::addFlash("error", "L'adresse email est déjà utilisée");
                        }
                    } else{
                        session::addFlash("error", "Nom d'utilisateur déjà utilisé");
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
                    $member = $memberManager->findOneByEmail($email);
                    if($member){
                        $hashPassword = $memberManager->findOneByEmail($email)->getPassword();
                        // var_dump($hashPassword); die;
                        if(password_verify($password, $hashPassword)){
                            session::setMember($member);
                            session::addFlash("success", "Vous vous êtes connecté avec succès");
                            $this->redirectTo("forum", "listCategories");
                        } else {
                            session::addFlash("error", "Le mot de passe ne correspond pas");
                        }
                    } else{
                        session::addFlash("error", "L'adresse email ne correspond pas");
                    }
                
                }
                return [
                    "view" => VIEW_DIR."security/register-login.php"
                ];
            }
        }
        public function logout(){
            if(isset($_POST['logout'])){
                session_destroy();
                $this->redirectTo("security", "pageRegisterLogin");
            }

        }

        
        
    }


?>