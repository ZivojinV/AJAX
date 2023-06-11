<?php
    class song {
 
        public $id;
        public $name;
        public $userID;

        public function __construct($id = null, $name = null, $userID = null){
            $this->id = $id;
            $this->name = $name;
            $this->userID = $userID;
        }

        public static function deleteById($id, mysqli $conn)
        {
            $q = "DELETE FROM playlist.song WHERE playlist.song.id='$id'";
            return $conn->query($q);
        }

        public static function add($name, $userID, mysqli $conn)
        {
            $q = "INSERT INTO playlist.song(name, userID) VALUES('$name', '$userID')";
            return $conn->query($q); 
        }

        public static function getByName($id, $name, mysqli $conn){
            $q = "SELECT s.id, s.name FROM playlist.song s WHERE s.userID='$id' AND s.name='$name'";
            return $conn->query($q); 
        }

        public static function getByUserId($userID, mysqli $conn){
            $q = "SELECT s.id, s.name FROM playlist.song s WHERE s.userID='$userID'";
            return $conn->query($q); 
        }

    }
?>