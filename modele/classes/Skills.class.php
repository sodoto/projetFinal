<?php
    class Skills{
        private $idSkill;
        private $description;
        private $image_path;
        
        public function __construct()
        {
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
			$this->idSkill = $x->idSkills;
            $this->description = $x->description;
            $this->image_path = $x->image_path;
		}
		
		
    }