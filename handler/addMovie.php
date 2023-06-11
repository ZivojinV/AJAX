<?php
    require  "../model/song.php";
    
    session_start();
    $host = "localhost";
    $db = "playlist";
    $username = "root";
    $password = "";
    try{
    $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_errno) {
            exit("Konekcija neuspesna: " . $conn->connect_errno);
        }
        $name = $_POST["name"];

        // $userID = $_POST['userID'];
        $userID = $_COOKIE['user_id'];

        song::add($name, $userID, $conn);
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
?>