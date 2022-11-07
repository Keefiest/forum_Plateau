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


        

    }
