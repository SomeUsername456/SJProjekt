<?php
    require_once('Database.php');
    require_once('UserAuth.php');
    require_once('ToDoList.php');

    class ToDoApp {
        private $db;
        private $userAuth;
        private $toDoList;

        public function __construct($dbConfig) {
            $this->db = new Database($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname'], $dbConfig['tbname'], $dbConfig['tb2name']);
            $this->userAuth = new UserAuth($this->db);
            $this->toDoList = new ToDoList($this->db, $dbConfig['tbname']);
        }

        public function run() {
            // Main logic for running the application
        }

        public function getUserAuth() {
            return $this->userAuth;
        }

        public function getToDoList() {
            return $this->toDoList;
        }
    }
?>
