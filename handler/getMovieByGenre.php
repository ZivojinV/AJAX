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

        $id = $_COOKIE['user_id'];
        $genre = $_GET["genre"];
        $res = movie::getByGenre($id, $genre, $conn);

        //while($data = $res->fetch_assoc()){
        //    echo json_encode($data['id']."|".$data['name']."|");
        //}
        while($data = $res->fetch_assoc()){
            $id = $data['id'];
            $name = $data['naziv'];
            $genre = $data['zanr'];
            $results[] = array('id' => $id, 'naziv' => $name, 'zanr' => $genre);
        }
        echo json_encode($results);
        
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
?>