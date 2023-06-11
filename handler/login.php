<?php
    require_once('../model/user.php');

    session_start();
    $host = "localhost";
    $db = "playlist";
    $username = "root";
    $password = "";
    try{
    $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_errno) {
            exit("Konekcija neuspesna:  " . $conn->connect_errno);
        }
        $username = $_GET["username"];
        $password = $_GET["password"];
        $res = user::logIn($username, $password, $conn);
        echo json_encode($res);

        if($res != null){
            setcookie('user_id', $res['id'], time() + 3600);
        }
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
    
?>