<?php
    session_start();
    include_once 'config.php';
    if(isset($_SESSION['id'])){
        $question = mysqli_real_escape_string($con, $_POST['question']);
        $option_a = mysqli_real_escape_string($con, $_POST['option_a']);
        $option_b = mysqli_real_escape_string($con, $_POST['option_b']);
        $option_c = mysqli_real_escape_string($con, $_POST['option_c']);
        $option_d = mysqli_real_escape_string($con, $_POST['option_d']);
        $correct = mysqli_real_escape_string($con, $_POST['correct']);
        $user_id = $_SESSION['id'];
        if (strlen($question) <= 0 || strlen($option_a) <= 0 || strlen($option_b) <= 0 || 
            strlen($option_c) <= 0 || strlen($option_d) <= 0 || strlen($correct) <= 0) {
                json_formatter(false, "All fields are required");
        }else{
            if ($correct != $option_a && $correct != $option_b && $correct != $option_c && $correct != $option_d) {
                json_formatter(false, "Invalid answer");
            }else{
                $check = "SELECT * FROM questions WHERE question='$question' && option_a='$option_a' && option_b='$option_b' && option_c='$option_c' && option_d='$option_d'";
                $check = mysqli_query($con, $check);
                if(mysqli_num_rows($check) != 0){
                    json_formatter(false, "Question has already been posted");
                }else{
                    /*json_formatter(false, "Testing");
                    exit();*/
                    $question_id = uniqid($_SESSION['id']).'-'.rand(100, 1000).'-'.rand(10000, 100000);
                    $insert = "INSERT INTO questions(question, option_a, option_b, option_c, option_d, correct, question_id, user_id)
                    VALUES('$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct', '$question_id', '$user_id')";
                    if(mysqli_query($con, $insert)){
                        json_formatter(true, "Posted");
                    }else{
                        json_formatter(false, "Sorry an error occured");
                    }
                }
            }
        }
    }else{
        json_formatter(false, "Invalid Request");
    }
?>