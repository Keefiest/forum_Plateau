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
                $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $member = 1;

                
                if($title && $category && $text && $member){
                    $insertTopic = $pdo->prepare("INSERT INTO topic(title, category_id, member_id) VALUES (:title, :category, :member)");
                    $insertTopic->execute([
                        "title" => $title,
                        "category" => $category,
                        "member" => $member
                    ]);
    
                }
                header('Location:index.php?action=');
            };    
        }



    }