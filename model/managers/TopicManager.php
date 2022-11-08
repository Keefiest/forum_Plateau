<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function getTopicsByCategory($id){
            $sql = "
                SELECT * 
                FROM ".$this->tableName." t
                INNER JOIN category c on t.category_id = c.id_category
                WHERE t.category_id = :id
            ";
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );   
        }
        public function addTopic(){
            if(isset($_POST["submit"])){
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $category = 1
                // filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT)
                ;
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



    }