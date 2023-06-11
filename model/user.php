<?php
    class user {
        public $id;
        public $username;
        public $password;
        public function __construct($id = null, $username=null, $password = null){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }
        public static function logIn($username, $password, mysqli $conn){
            $q = "SELECT id FROM playlist.user WHERE playlist.user.username='$username' AND playlist.user.password='$password'";
            return $conn->query($q)->fetch_assoc();
        }

        public static function register($username, $password, mysqli $conn){
            $q = "INSERT INTO playlist.user(username, password) VALUES('$username', '$password')";
            return $conn->query($q)->fetch_assoc();
        }
    }
?>