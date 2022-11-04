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


    }