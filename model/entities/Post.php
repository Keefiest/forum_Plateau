<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $text;
        private $topic;
        private $member;


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
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
                $this->text = $text;

                return $this;
        }

        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
            return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
            $this->topic = $topic;
            
            return $this;
        }
        /**
         * Get the value of member
         */ 
        public function getMember()
        {
                return $this->member;
        }

        /**
         * Set the value of member
         *
         * @return  self
         */ 
        public function setMember($member)
        {
                $this->member = $member;

                return $this;
        }
    }
    