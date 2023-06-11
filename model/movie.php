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

        public static function add($name, $userID, $genre, mysqli $conn)
        {
            $q = "INSERT INTO watchlist.film(naziv, korisnikID, zanr) VALUES('$name', '$userID', '$genre')";
            return $conn->query($q); 
        }

        public static function getByName($id, $name, mysqli $conn){
            $q = "SELECT s.id, s.naziv, s.zanr FROM watchlist.film s WHERE s.korisnikID='$id' AND s.naziv='$name'";
            return $conn->query($q); 
        }

        public static function getByGenre($id, $genre, mysqli $conn){
            $q = "SELECT s.id, s.naziv, s.zanr FROM watchlist.film s WHERE s.korisnikID='$id' AND s.zanr='$genre'";
            return $conn->query($q); 
        }

        public static function getByUserId($userID, mysqli $conn){
            $q = "SELECT s.id, s.naziv, s.zanr FROM watchlist.film s WHERE s.korisnikID='$userID'";
            return $conn->query($q); 
        }

    }
?>