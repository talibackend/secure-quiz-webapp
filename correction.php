<?php
    session_start();
    include_once 'config.php';
    redirect();
    $quiz_id = $_GET['id'];
    $check = "SELECT * FROM results WHERE id='$quiz_id'";
    $check = mysqli_query($con, $check);
    if (mysqli_num_rows($check) != 1) {
        header('Location: results.php');
    }else{
        $details = mysqli_fetch_assoc($check);
        $questions_id = $details['correction_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Quiz Website</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <main class="main">
        <div class="form-container">
            <ol class="list-of-correction">
                <?php 
                    $questions_id = json_decode($questions_id, true);
                    for ($i=0; $i < count($questions_id); $i++) { 
                        $id = $questions_id[$i];
                        $fetch = "SELECT question, correct FROM questions WHERE question_id='$id'";
                        $fetch = mysqli_query($con, $fetch);
                        $data = mysqli_fetch_assoc($fetch);
                        echo '
                        <li class="each-correction">
                            <ul>
                                <li>'.$data['question'].'</li>
                                <li class="correct-answer">Correct - '.$data['correct'].'</li>
                            </ul>
                        </li>';
                    }
                ?>
            </ol>
        </div>
    </main>
</body>
</html>