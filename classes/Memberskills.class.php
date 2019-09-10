<?php
    class Memberskills{
        private $idMember;
        private $skills;

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

        public function getSkills()
        {
            return $this->skills;
        }

        public function setSkills($skills)
        {
            $this->skills = $skills;
        }


    }