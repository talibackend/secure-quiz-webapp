<?php
    session_start();
    include_once 'config.php';
    if(isset($_SESSION['id'])){
        $answers = trim(file_get_contents("php://input"));
        $answers = json_decode($answers, true);
        $response = ['correct' => 0, 'wrong' => 0, 'n_attempted' => 0];
        $correction = array();
        for ($i=0; $i < count($answers); $i++) { 
            $question_id = $answers[$i][0]; 
            $answer = $answers[$i][1];
            if($answer == ''){
                $response['n_attempted'] = $response['n_attempted'] + 1;
                array_push($correction, $question_id);
            }else{
                $check = "SELECT * FROM questions WHERE question_id='$question_id'";
                $check = mysqli_query($con, $check);
                $fetched_answer = mysqli_fetch_assoc($check)['correct'];
                if ($fetched_answer != $answer) {
                    $response['wrong'] = $response['wrong'] + 1;
                    array_push($correction, $question_id);
                }else{
                    $response['correct'] = $response['correct'] + 1;
                }
            }
        }
        $correction = json_encode($correction);
        $correct = $response['correct'];
        $wrong = $response['wrong'];
        $n_a = $response['n_attempted'];
        $user_id = $_SESSION['id'];
        $question_count = $correct + $wrong + $n_a;
        $insert = "INSERT INTO results(questions_count, correct, wrong, n_a, correction_id, user_id)
        VALUES('$question_count', '$correct', '$wrong', '$n_a', '$correction', '$user_id')";
        if(mysqli_query($con, $insert)){
            json_formatter(true, "");
        }else{
            json_formatter(false, "An error occured");
        }
    }else{
        json_formatter(false, "Invalid Request");
    }
?>