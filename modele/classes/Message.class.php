<?php
    class Message{
        private $idMessage;
		private $message;
		private $idRequest;
       	private $idMember; 	
		private $dateHeure;
		private $messageLu;
		private $username;
		private $title;
		
        public function __construct()
        {
        }

        public function getIdMessage()
        {
            return $this->idMessage;
        }

        public function setIdMessage($idMessage)
        {
            $this->idMessage = $idMessage;
        }

		public function getMessage()
        {
            return $this->message;
        }

        public function setMessage($message)
        {
            $this->message = $message;
        }
		
		
		public function getIdRequest()
        {
            return $this->idRequest;
        }

        public function setIdRequest($idRequest)
        {
            $this->idRequest = $idRequest;
        }
		
		 public function getIdMember()
        {
            return $this->idMember;
        }

        public function setIdMember($idMember)
        {
            $this->idMember = $idMember;
        }
		
		public function getDateHeure()
        {
            return $this->dateHeure;
        }

        public function setDateHeure($dateHeure)
        {
            $this->dateHeure = $dateHeure;
        }
		
		public function getMessageLu()
        {
            return $this->messageLu;
        }

        public function setMessageLu($messageLu)
        {
            $this->messageLu = $messageLu;
        }
		
		public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }
		
		public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function loadFromObject($x) {
			$this->idMessage = $x->idMessage;
			$this->message = $x->message;
			$this->idRequest = $x->idRequest;
			$this->idMember = $x->idMember;
			$this->dateHeure = $x->dateHeure;
			$this->messageLu = $x->messageLu;
			
		}
		 public function loadFromObject1($x) {

			$this->messageLu = $x->messageLu;
			
		}
		
		 public function loadFromObjectMessages($x) {
			$this->dateHeure = $x->dateHeure;
			$this->username = $x->username;
			$this->title = $x->title;
			$this->messageLu = $x->messageLu;
			$this->idMessage = $x->idMessage;	
		}
		

public function __toString()
	{
		return "Message[".$this->idMessage.",".$this->message.",".$this->idRequest.",".$this->idMember.",".$this->dateHeure.",".$this->messageLu.",".$this->username.",".$this->title."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	

    }