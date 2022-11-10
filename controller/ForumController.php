<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\MemberManager;
    use Model\Managers\PostManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){

        }

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
                    "topics" => $topicManager->getTopicsByCategory($id),
                    "category" => $categoryManager->findOneById($id)
                ]
            ];
        }
        
        public function listPosts($id){
            $postsManager = new PostManager();
            $memberManager = new memberManager();
            return[
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postsManager->getPostsByTopic($id),
                    "member" => $memberManager->findOneById($id)
                ]
            ];
        }

        public function addTopic(){
            if(isset($_POST["submit"])){
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $member = 1;
                
                
                if($title && $category && $text && $member){
                    $postManager = new PostManager;
                    
                    $topicData = [
                        "title" => $title,
                        "category_id" => $category,
                        "member_id" => $member
                    ];
                    
                    $lastInsertTopic = $this->add($topicData);
                    
                    $dataPost = [
                        "text" => $text,
                        "topic_id" => $lastInsertTopic,
                        "member_id" => $member 
                    ];
                    $postManager->add($dataPost);
                    
                };
                header('Location:index.php?action=listCategories');
            };    
        }
        
        public function addPost(){
            if(isset($_POST['submit'])){
                //need to add list of categories to choose from in addTopics
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $topic = $_GET['id'];
                $member = 1;

                if($text && $topic && $member){
                    // Array preparation to inject data in DB with add function
                    $dataPost = [
                        "text" => $text,
                        "topic_id" => $topic,
                        "member_id" => $member
                    ];
                    $this->add($dataPost);
                    header('Location:index.php?ctrl=forum&action=listPosts&id='.$topic);
                }
                
            }
        }
        
        

    }
