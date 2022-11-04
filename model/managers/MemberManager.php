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

        public function finOneByEmail($email){

            $sql ="
                SELECT *
                FROM ".$this->tableName." m
                WHERE m.email = :email
            ";
            return $this->getOneOrNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
        }


    }