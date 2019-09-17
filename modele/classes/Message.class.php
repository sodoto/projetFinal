<?php
    class Message{
        private $idMessage;
        private $idOffer;
        private $idMember;
        private $message;
		private $timeMessage;//Allows to apply the "order by statement" for displaying the conversation according to time.

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

        public function getIdOffer()
        {
            return $this->idOffer;
        }

        public function setIdOffer($idOffer)
        {
            $this->idOffer = $idOffer;
        }

        public function getIdMember()
        {
            return $this->idMember;
        }

        public function setIdMember($idMember)
        {
            $this->idMember = $idMember;
        }

        public function getMessage()
        {
            return $this->message;
        }

        public function setMessage($message)
        {
            $this->message = $message;
        }

		 public function getTimeMessage()
        {
            return $this->timeMessage;
        }

        public function setTimeMessage($timeMessage)
        {
            $this->timeMessage = $timeMessage;
        }

        public function loadFromObject($x) {
			$this->idMessage = $x->idMessage;
			$this->idOffer = $x->idOffer;
			$this->idMember = $x->idMember;
			$this->message = $x->message;
			$this->timeMessage = $x->timeMessage;
		}


    }