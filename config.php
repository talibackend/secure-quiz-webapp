<?php  
    function redirect(){
        if(!isset($_SESSION['id'])){
            header('Location: index.php');
        }
    }
    function json_formatter($status, $msg){
        header('Content-Type: application/json');
        echo json_encode(['status' => $status, 'msg' => $msg]);
    }
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "quiz";

    $con = mysqli_connect($host, $user, $pass, $db);
?>