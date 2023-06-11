<?php
    class movie {
 
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
            $q = "DELETE FROM watchlist.film WHERE watchlist.film.id='$id'";
            return $conn->query($q);
        }

        public static function add($name, $userID, mysqli $conn)
        {
            $q = "INSERT INTO watchlist.film(naziv, korisnikID) VALUES('$name', '$userID')";
            return $conn->query($q); 
        }

        public static function getByName($id, $name, mysqli $conn){
            $q = "SELECT s.id, s.naziv FROM watchlist.film s WHERE s.korisnikID='$id' AND s.naziv='$name'";
            return $conn->query($q); 
        }

        public static function getByUserId($userID, mysqli $conn){
            $q = "SELECT s.id, s.naziv FROM watchlist.film s WHERE s.korisnikID='$userID'";
            return $conn->query($q); 
        }

    }
?>