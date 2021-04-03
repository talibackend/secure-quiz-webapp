<?php
    session_start();
    include_once 'config.php';
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $no_of_questions = mysqli_real_escape_string($con, $_POST['no_of_questions']);
        $duration = mysqli_real_escape_string($con, $_POST['duration']);
        if (empty($no_of_questions) || empty($duration)) {
            json_formatter(false, "All fields are required");
        }else{
            $nums = ['2', '5', '10', '15', '20'];
            $durations = ['300', '600', '900', '1200', '1800'];

            if(!in_array($no_of_questions, $nums)){
                json_formatter(false, "Invalid number of questions");
            }else{
                if (!in_array($duration, $durations)) {
                    json_formatter(false, "Invalid duration");
                }else{
                    $questions = array();
                    $fetch = "SELECT question, option_a, option_b, option_c, option_d, question_id FROM questions
                            WHERE user_id !='$id' ORDER BY RAND() LIMIT $no_of_questions";
                    $fetch= mysqli_query($con, $fetch);
                    while ($row = mysqli_fetch_assoc($fetch)) {
                        array_push($questions, $row);
                    }
                    json_formatter(true, $questions);
                }
            }
        }
    }else{
        json_formatter(false, "Invalid Request");
    }
?>