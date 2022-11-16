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

        public function getTopicsByCategory(array $order = null, $id){
            
            $orderQuery = ($order) ?                 
                "ORDER BY ".$order[0]. " ".$order[1] :
                "";

            $sql = "
                    SELECT * 
                    FROM ".$this->tableName." t
                    WHERE t.category_id = :id
                    "
                    .$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );   
        }

    }