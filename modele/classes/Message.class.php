<?php
    class Message{
        private $idMessage;
		private $message;
		private $dateHeure;
        private $idRequest;
        private $idMember;  
		
		
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

        public function loadFromObject($x) {
			$this->idMessage = $x->idMessage;
			$this->message = $x->message;
			$this->idOffer = $x->idRequest;
			$this->idMember = $x->idMember;
			$this->timeMessage = $x->dateHeure;
		}

public function __toString()
	{
		return "Message[".$this->idMessage.",".$this->message.",".$this->dateHeure.",".$this->idRequest.",".$this->idMember."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	

    }