<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class MemberManager extends Manager{

        protected $className = "Model\Entities\Member";
        protected $tableName = "member";


        public function __construct(){
            parent::connect();
        }
        public function findOneByEmail($email){

            $sql ="
                SELECT *
                FROM ".$this->tableName." m
                WHERE email = :email
            ";
            return $this->getOneOrNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
        }
        public function findOneByUser($username){
    
            $sql = "SELECT *
                    FROM ".$this->tableName." m
                    WHERE m.username = :username";
    
            return $this->getOneOrNullResult(
                DAO::select($sql, ['username' => $username], false), 
                $this->className
            );
        }


    }