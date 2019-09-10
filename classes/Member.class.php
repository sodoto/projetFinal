<?php
	class Member{
		private $idMember;
		private $username;
		private $password;
		private $lastname;
		private $firstname;
		private $email;
		private $city;

		public function __construct(){

		}

		public function getIdMember(){
			return $this->idMember;
		}

		public function setIdMember($value){
			$this->idMember = $value;
		}

		public function getUsername(){
			return $this->username;
		}

		public function setUsername($value){
			$this->username = $value;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($value){
			$this->password = $value;
		}

		public function getLastname(){
			return $this->lastname;
		}

		public function setLastname($value){
			$this->lastname = $value;
		}

		public function getFirstname(){
			return $this->firstname;
		}

		public function setFirstname($value){
			$this->firstname = $value;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEMail($value){
			$this->email = $value;
		}

		public function getCity(){
			return $this->city;
		}

		public function setCity($value){
			$this->city = $value;
		}

	}