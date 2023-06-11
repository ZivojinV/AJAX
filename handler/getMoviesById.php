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

        $userID = $_COOKIE['user_id'];

        $res = song::getByUserId($userID, $conn);

       // while($data = $res->fetch_assoc()){
        //    echo json_encode($data['id']."|".$data['name']."|");
       // }
       while($data = $res->fetch_assoc()){
        $id = $data['id'];
        $name = $data['name'];
        $results[] = array('id' => $id, 'name' => $name);
    }
    echo json_encode($results);
        
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
?>