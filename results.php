<?php
    session_start();
    include_once 'config.php';
    redirect();
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
        <div class="form-container" id="result-container">
            <table class="results-table" align="center">
                <tr class="heading-row">
                    <td>Date</td>
                    <td>Number of Questions</td>
                    <td>Attempted(%)</td>
                    <td>Correct(%)</td>
                    <td>Wrong(%)</td>
                </tr>
                <?php 
                    $id = $_SESSION['id'];
                    $check = "SELECT * FROM results WHERE user_id='$id' ORDER BY id DESC";
                    $check = mysqli_query($con, $check);
                    if(mysqli_num_rows($check) < 1){
                        echo '
                        <tr>
                            <td colspan="5">No Results Available <a href="start.php">Click to take a quiz.</a></td>
                        </tr>';
                    }else{
                        while ($data = mysqli_fetch_assoc($check)) {
                            $date = $data['date_submitted'];
                            $count = $data['questions_count'];
                            $score = $data['correct'];
                            $score = ($score/$count) * 100;
                            $score = round($score, 2);
                            $wrong = 100 - $score;
                            $attempted = $data['correct'] + $data['wrong'];
                            $attempted = ($attempted/$count) * 100;
                            $attempted = round($attempted, 2);
                            $result_id = $data['id'];
                            if ($wrong <= 0) {
                                $correction = '';
                            }else{
                                $correction = ' - <a href="correction.php?id='.$result_id.'">View Correction</a>';
                            }
                            echo '<tr>
                                    <td>'.$date.'</td>
                                    <td>'.$count.'</td>
                                    <td>'.$attempted.'%</td>
                                    <td>'.$score.'%</td>
                                    <td>'.$wrong.'%'.$correction.' </td>
                                </tr>';
                        }
                    }
                ?>
                <!--<tr>
                    <td>2020-01-29</td>
                    <td>12</td>
                    <td>95%</td>
                    <td>100%</td>
                    <td>95%</td>
                    <td>0% - <a href="correction.php">View Correction</a> </td>
                </tr>-->
            </table>
        </div>
    </main>
</body>
</html>