<?php
    class MemberSkills{
        private $idMember;
        private $idSkill;

        public function __construct()
        {
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

        public function loadFromObject($x) {
			$this->idSKill = $x->idSkill;
			$this->idMember = $x->idMember;
		}

    }
