<?php
    class Message{
        private $idMessage;
		private $message;
		private $idRequest;
       	private $idMember; 	
		private $dateHeure;
		private $messageLu;
		
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

public function __toString()
	{
		return "Message[".$this->idMessage.",".$this->message.",".$this->idRequest.",".$this->idMember.",".$this->dateHeure.",".$this->messageLu."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	

    }