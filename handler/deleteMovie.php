<?php
    require  "../model/movie.php";

    session_start();
    $host = "localhost";
    $db = "watchlist";
    $username = "root";
    $password = "";
    try {
        $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_errno) {
            exit("Konekcija neuspesna: " . $conn->connect_errno);
        }
        
        if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
            parse_str(file_get_contents("php://input"), $delete_vars);
            $id = $delete_vars["id"];
            movie::deleteById($id, $conn);
        }
    } catch(Exception $e) {
        echo $e->getMessage() . "<br/>";
        while ($e = $e->getPrevious()) {
            echo 'Previous exception: '.$e->getMessage() . "<br/>";
        }
    }
?>