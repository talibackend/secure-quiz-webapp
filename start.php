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
        <div class="form-container">
            <p id="timer" style="font-weight : bolder;"></p>
            <div class="question-container" id="all_question_container">
                <form id="options-to-start" class="signup-form" onsubmit="return false;">
                    <h2 class="label">Start Quiz</h2>
                    <div class="each-input">
                        <label for="gender">Number of questions:</label><br>
                        <select class="input-fields" id="no_of_questions">
                            <option value="" selected>Select number of questions</option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="each-input">
                        <label for="gender">Duration:</label><br>
                        <select class="input-fields" id="duration">
                            <option value="" selected>Select Duration</option>
                            <option value="300">5 minutes</option>
                            <option value="600">10 minutes</option>
                            <option value="900">15 minutes</option>
                            <option value="1200">20 minutes</option>
                            <option value="1800">30</option>
                        </select>
                    </div>
                    <p class="error-handler" id="error-handler"></p>
                    <div id="btn-container" class="each-input">
                        <button id="submit" class="submit">Submit</button>
                    </div>
                </form>
            </div>
            <p class="buttons" id="btns-container">
            </p>
        </div>
    </main>
    <script src="js/start.js"></script>
</body>
</html>