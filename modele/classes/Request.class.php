<?php
	class Request{
		private $idRequest;
		private $idMember;
		private $title;
		private $dateRequest;
		private $dateService;
		private $city;
		private $status;

		public function __construct(){

		}

		public function getIdRequest(){
			return $this->idRequest;
		}

		public function setIdRequest($value){
			$this->idRequest = $value;
		}

		public function getIdMember(){
			return $this->idMember;
		}

		public function setIdMember($value){
			$this->idMember = $value;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($value){
			$this->title = $value;
		}

		public function getDateRequest(){
			return $this->dateRequest;
		}

		public function setDateRequest($value){
			$this->dateRequest = $value;
		}

		public function getDateService(){
			return $this->dateService;
		}

		public function setDateService($value){
			$this->dateService = $value;
		}

        public function getCity(){
            return $this->city;
        }

        public function setCity($value){
            $this->city = $value;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($value){
            $this->status = $value;
		}
		
		public function loadFromObject($x) {
			$this->idRequest = $x->idRequest;
			$this->idMember = $x->idMember;
			$this->title = $x->title;
			$this->dateRequest = $x->dateRequest;
			$this->dateService = $x->dateService;
			$this->city = $x->city;
			$this->status = $x->status;
		}
	}