<?php
    /**
     * Created by PhpStorm.
     * User: ankit
     * Date: 1/10/17
     * Time: 12:25 AM
     */
    Abstract class Database{
        public function Create(){}
        public function Read(){}
        public function Update(){}
        public function Delete(){}
    }

    class MySql extends Database{

    }
