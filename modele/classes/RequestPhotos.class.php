<?php
	class RequestPhotos{
		private $idPhoto;
		private $nomFichier;
		private $dateUpLoad;
		private $idRequestPhoto;
		

		public function __construct(){

		}

		public function getIdPhoto(){
			return $this->idPhoto;
		}

		public function setIdPhoto($value){
			$this->idPhoto = $value;
		}

		public function getNomFichier(){
			return $this->nomFichier;
		}

		public function setNomFichier($value){
			$this->nomFichier = $value;
		}

		public function getDateUpLoad(){
			return $this->dateUpLoad;
		}

		public function setDateUpLoad($value){
			$this->dateUpLoad = $value;
		}

		public function getIdRequestPhoto(){
			return $this->idRequestPhoto;
		}

		public function setIdRequestPhoto($value){
			$this->idRequestPhoto = $value;
		}

		

		public function loadFromObject($x) {
			$this->idPhoto = $x->idPhoto;
			$this->nomFichier = $x->nomFichier;
			$this->dateUpLoad = $x->dateUpLoad;
			$this->idRequestPhoto = $x->idRequestPhoto;
			
		}
			public function loadFromObject1($x) {
			
			$this->nomFichier = $x->nomFichier;
			
			
		}
		
		

	}