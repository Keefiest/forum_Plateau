<?php
    namespace Model\Entities;

    use App\Entity;

    final class Member extends Entity{

        private $id;
        private $username;
        private $password;
        private $email;
        private $rank;
        private $phoneNumber;
        private $registerDate;
        private $banned;

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
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

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
         /**
         * Get the value of ban
         */ 
        public function getBanned()
        {
            return $this->banned;
        }
        
        /**
         * Set the value of ban
         *
         * @return  self
         */ 
        public function setBanned($banned)
        {
            $this->banned = $banned;
            
            return $this;
        }
        public function __toString()
        {
            return $this->username;
        }
    }
