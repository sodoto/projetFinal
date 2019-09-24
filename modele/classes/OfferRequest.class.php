<?php
    class OfferRequest{
        private $idOffer;
        private $idMember;
        private $idRequest;
        private $dateOffer;
        private $comment;
        private $status;

        public function __construct()
        {
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

        public function getIdRequest()
        {
            return $this->idRequest;
        }

        public function setIdRequest($idRequest)
        {
            $this->idRequest = $idRequest;
        }

        public function getDateOffer()
        {
            return $this->dateOffer;
        }

        public function setDateOffer($dateOffer)
        {
            $this->dateOffer = $dateOffer;
        }

        public function getComment()
        {
            return $this->comment;
        }

        public function setComment($comment)
        {
            $this->comment = $comment;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function loadFromObject($x) {
			$this->idOffer = $x->idOffer;
            $this->idMember = $x->idMember;
            $this->idRequest = $x->idRequest;
            $this->dateOffer = $x->dateOffer;
            $this->comment = $x->comment;
            $this->status = $x->status;
        }
        
public function __toString()
	{
		return "OfferRequest[".$this->idOffer.",".$this->status.",".$this->dateOffer.",".$this->comment.",".$this->idMember.",".$this->idRequest."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}


    }
