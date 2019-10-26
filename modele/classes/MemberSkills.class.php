<?php
    class MemberSkills{
		private $idRegistre;
		private $idMember;
        private $idSkill;
		private $description;
		private $image_path;
		
        public function __construct()
        {
        }

         public function getIdRegistre()
        {
            return $this->idRegistre;
        }

        public function setIdRegistre($idRegistre)
        {
            $this->idRegistre = $idRegistre;
        }
		
		public function getIdMember()
        {
            return $this->idMember;
        }

        public function setIdMember($idMember)
        {
            $this->idMember = $idMember;
        }

        public function getIdSkill()
        {
            return $this->idSkill;
        }

        public function setIdSkill($idSkill)
        {
            $this->idSkill = $idSkill;
        }
		
		 public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }
		
		 public function getImage_path()
        {
            return $this->image_path;
        }

        public function setImage_path($image_path)
        {
            $this->image_path = $image_path;
        }

        public function loadFromObject($x) {
			$this->idRegistre = $x->idRegistre;
			$this->idSKill = $x->idSkill;
			$this->idMember = $x->idMember;
			
		}
		
		 public function loadFromObject1($x) {
			$this->idRegistre = $x->idRegistre;
            $this->idMember = $x->idMember;
            $this->idSkill = $x->idSkills;
			$this->description = $x->description;
			$this->image_path = $x->image_path;
		}
		
		

    }
