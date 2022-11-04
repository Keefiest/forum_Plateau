<?php
    namespace Model\Entities;

    use App\Entity;

    final class Member extends Entity{

        private $id;
        private $nickname;
        private $password;
        private $email;
        private $rank;
        private $phoneNumber;
        private $registerDate;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nickname
         */ 
        public function getNickname()
        {
                return $this->nickname;
        }

        /**
         * Set the value of nickname
         *
         * @return  self
         */ 
        public function setNickname($nickname)
        {
                $this->nickname = $nickname;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
        
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }
        
        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            $this->email = $email;
            
            return $this;
        }
        /**
         * Get the value of rank
         */ 
        public function getRank()
        {
            return $this->rank;
        }
        
        /**
         * Set the value of rank
         *
         * @return  self
         */ 
        public function setRank($rank)
        {
            $this->rank = $rank;
            
            return $this;
        }

        /**
         * Get the value of phoneNumber
         */ 
        public function getphoneNumber()
        {
            return $this->phoneNumber;
        }
        /**
         * Set the value of phoneNumber
         *
         * @return  self
         */ 
        public function setphoneNumber($phoneNumber)
        {
            $this->phoneNumber = $phoneNumber;
            
            return $this;
        }
        /**
         * Get the value of registerDate
         */ 
        public function getregisterDate(){
            $formattedDate = $this->registerDate->format("d/m/Y");
            return $formattedDate;
        }
        /**
         * Set the value of registerDate
         */ 
        public function setregisterDate($date){
            $this->registerDate = new \DateTime($date);
            return $this;
        }
        public function __toString()
        {
            return $this->nickname;
        }
    }
