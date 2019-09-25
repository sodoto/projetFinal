<?php
    class Message{
        private $idMessage;
		private $message;
		private $idOffer;
       	private $idMemberEmetteur; 	
		private $dateHeure;
		
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
		
		
		public function getIdOffer()
        {
            return $this->idOffer;
        }

        public function setIdOffer($idOffer)
        {
            $this->idOffer = $idOffer;
        }
		
		 public function getIdMemberEmetteur()
        {
            return $this->idMemberEmetteur;
        }

        public function setIdMemberEmetteur($idMemberEmetteur)
        {
            $this->idMemberEmetteur = $idMemberEmetteur;
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
			$this->idOffer = $x->idOffer;
			$this->idMemberEmetteur = $x->idMemberEmetteur;
			$this->dateHeure = $x->dateHeure;
			
		}

public function __toString()
	{
		return "Message[".$this->idMessage.",".$this->message.",".$this->idOffer.",".$this->idMemberEmetteur.",".$this->dateHeure."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	

    }