<?php
	class Request{
		private $idRequest;
		private $skillWanted;
		private $idMember;
		private $title;
		private $dateRequest;
		private $dateService;
		private $location;
		private $status;

		public function __construct(){

		}

		public function getIdRequest(){
			return $this->idRequest;
		}

		public function setIdRequest($value){
			$this->idRequest = $value;
		}

		public function getSkillWanted(){
			return $this->skillWanted;
		}

		public function setSkillWanted($value){
			$this->skillWanted = $value;
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

        public function getLocation(){
            return $this->location;
        }

        public function setLocation($value){
            $this->location = $value;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($value){
            $this->status = $value;
		}
		
		public function __toString()
	{
		return "Request[".$this->idRequest.",".$this->skillWanted.",".$this->title.",".$this->dateRequest.",".$this->dateService.",".$this->location.",".$this->status.",".$this->idMember."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	
	public function loadFromArray($tab)
	{
		$this->idRequest=$tab["idRequest"];
		$this->skillWanted=$tab["skillWanted"];
		$this->title = $tab["title"];
		$this->dateRequest = $tab["dateRequest"];
		$this->dateService = $tab["dateService"];
		$this->location = $tab["location"];
		$this->status = $tab["status"];
		$this->idMember = $tab["idMember"];
	}
		
		public function loadFromObject($x) {
			$this->idRequest = $x->idRequest;
			$this->skillWanted= $x->skillWanted;
			$this->idMember = $x->idMember;
			$this->title = $x->title;
			$this->dateRequest = $x->dateRequest;
			$this->dateService = $x->dateService;
			$this->location = $x->location;
			$this->status = $x->status;
		}
		
		public function loadFromObject1($x)
	{
		$this->idRequest = $x->idRequest;
		$this->skillWanted= $x->description;
		$this->title = $x->title;
		$this->dateRequest = $x->dateRequest;
		$this->dateService = $x->dateService;
		$this->location = $x->location;
		$this->status = $x->status;
		//Atribute from another table innerjoin
		$this->idMember = $x->username;
	
	}
	}