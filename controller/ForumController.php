<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\MemberManager;
    use Model\Managers\PostManager;
    
    
    
    class CategoryController extends AbstractController implements ControllerInterface{
        public function index(){
            $categoryManager = new CategoryManager();
            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "date" => [
                    "categories" => $categoryManager->findAll(["nameCategory"])
                ]
            ];
        }
    };

    class MemberController extends AbstractController implements ControllerInterface{
        public function index(){
            $memberManager = new MemberManager();
            return [
                "view" => VIEW_DIR."forum/listMembers.php",
                "date" => [
                    "members" => $memberManager->findAll(["nickname"])
                ]
            ];
        }
    };

    class PostController extends AbstractController implements ControllerInterface{
        public function index(){
            $postManager = new PostManager();
            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "date" => [
                    "posts" => $postManager->findAll(["nameCategory"])
                ]
            ];
        }
    };
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();
           

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationDate", "DESC"])
                ]
            ];
        
        }

        

    }
