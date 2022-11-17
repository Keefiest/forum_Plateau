<?php

    namespace Controller;

    use App\Session as session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\MemberManager;
    use Model\Managers\PostManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){

        }
        // Listings
        public function listCategories(){
            $categoryManager = new CategoryManager();
            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
                ]
            ];
        }
       
        
        public function listTopics($id){
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
            return[
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->getTopicsByCategory(["creationDate", "DESC"], $id),
                    "category" => $categoryManager->findOneById($id)
                ]
            ];
        }
        
        public function listPosts($id){
            $postsManager = new PostManager();
            $topicManager = new TopicManager();
            return[
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postsManager->getPostsByTopic($id),
                    "topic" => $topicManager->findOneById($id)
                ]
            ];
        }
        // Add in db
        public function addTopic($id){
            $topicManager = new TopicManager();

            if(isset($_POST["submit"])){
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $member = session::getMember()->getId();
                
                
                if($title && $text){
                    
                    $topicData = $topicManager->add([
                        "title" => $title,
                        "category_id" => $id,
                        "closed" => 0,
                        "member_id" => $member
                    ]);
                    
                    if($text){
                        $postManager = new PostManager;
                        $postManager->add([
                            "text" => $text,
                            "topic_id" => $topicData,
                            "member_id" => $member 
                        ]);  
                    }
                    
                };
                header('Location:index.php?ctrl=forum&action=listTopics&id='.$id);
            };    
        }
        public function addPost($id){
            $postManager = new PostManager();
            if (isset($_POST['submit'])){
                $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $member = session::getMember()->getId();;

                $postManager->add([
                    "text" => $text,
                    "topic_id" => $id,
                    "member_id" => $member
                ]);
                header('Location:index.php?ctrl=forum&action=listPosts&id='.$id);
            }
        }
        public function lockTopic($id){
            $topicManager = new TopicManager();
            $topic = $topicManager->findOnebyId($id);
            if(isset($_POST['lockTopic'])){
                if($_SESSION["member"]){
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $topic->getMember()->getId()){
                        $topicManager->managerLockTopic($id);
                        $this->redirectTo("forum", "listPosts", $id);
                    }
                }
            }
        }

        public function unlockTopic($id){
            $topicManager = new TopicManager();
            $topic = $topicManager->findOnebyId($id);
            if(isset($_POST['unlockTopic'])){
                if($_SESSION["member"]){
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $topic->getMember()->getId()){
                        $topicManager->managerUnlockTopic($id);
                        $this->redirectTo("forum", "listPosts", $id);
                    }
                }
            }
        }
       
        
        

    }
