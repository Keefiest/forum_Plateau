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
        public function listMembers(){
            $memberManager = new MemberManager();
            return [
                "view" => VIEW_DIR."forum/listMembers.php",
                "data" => [
                    "members" => $memberManager->findAll(["username", "ASC"])
                ]
            ];
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
                $this->redirectTo("forum", "listTopics", $id);
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
                $this->redirectTo("forum", "listPosts", $id);
            }
        }
        // lock&unlock topic
        public function lockTopic($id){
            $topicManager = new TopicManager();
            $topic = $topicManager->findOnebyId($id);
            if(isset($_POST['lockTopic'])){
                if($_SESSION["member"]){
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $topic->getMember()->getId() or Session::isAdmin()){
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
                    if($memberId == $topic->getMember()->getId() or Session::isAdmin()){
                        $topicManager->managerUnlockTopic($id);
                        $this->redirectTo("forum", "listPosts", $id);
                    }
                }
            }
        }
        //  Delete in DB
        public function delTopic($id){
            $topicManager = new TopicManager();
            $postsManager = new PostManager();
            $topic = $topicManager->findOnebyId($id);
            $posts = $postsManager->getPostsByTopic($id);
                if($_SESSION["member"]){
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $topic->getMember()->getId() or Session::isAdmin()){
                        foreach($posts as $post){   
                            $postsManager->delPostsDuringDelTopic($id);
                        }
                        
                        $topicManager->delete($id);
                        $this->redirectTo("forum", "listTopics", $topic->getCategory()->getId());
                    }
                }

        }
        public function delPost($id){
            $postManager = new PostManager();
            $post = $postManager->findOneById($id); 
                if($_SESSION["member"]){
                    $memberId = $_SESSION['member']->getId();
                    if($memberId == $post->getMember()->getId() or Session::isAdmin()){
                        $postManager->delete($id);
                        $this->redirectTo("forum", "listPosts", $post->getTopic()->getId());
                    }
                } 
        }
        // Edit in db
        public function editTopic($id){
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $topicManager = new TopicManager();
            $topic = $topicManager->findOneById($id);

            if($_POST["editTopic"]){
                $topicManager->editTopic($id, $title);
                $this->redirectTo("forum", "ListTopics", $topic->getCategory()->getId());
            }
        }
        
        public function editPost($id){
            $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $postManager = new PostManager();
            $post = $postManager->findOneById($id);
            if($_POST["editPost"]){
                $postManager->editPost($id, $text);
                $this->redirectTo("forum", "ListPosts", $post->getTopic()->getId());
            }
        }
        public function pageEditTopic($id){
            $topicManager = new TopicManager();
            $topic = $topicManager->findOneById($id);

            return [
                "view" => VIEW_DIR."forum/editTopic.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id)
                ]
            ];

        }
        public function pageEditPost($id){
            $postManager = new PostManager();
            $post = $postManager->findOneById($id);

            return [
                "view" => VIEW_DIR."forum/editpost.php",
                "data" => [
                    "post" => $postManager->findOneById($id)
                ]
            ];
        }
        

    }