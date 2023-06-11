<?php
    require  "../model/movie.php";
    
    session_start();
    $host = "localhost";
    $db = "watchlist";
    $username = "root";
    $password = "";
    try{
    $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_errno) {
            exit("Konekcija neuspesna: " . $conn->connect_errno);
        }
        $name = $_POST["name"];
        $genre = $_POST["genre"];

        // $userID = $_POST['userID'];
        $userID = $_COOKIE['user_id'];

        movie::add($name, $userID, $genre, $conn);
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
?>