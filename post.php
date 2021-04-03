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
    <title>Post Question</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <main class="main">
        <div class="form-container">
            <form id="signup-form" class="signup-form" onsubmit="return false;">
                <h2 class="label">Post Question</h2>
                <div class="each-input">
                    <label for="question">Question:</label><br>
                    <textarea id="question" class="input-fields" cols="30" rows="10"></textarea>
                </div>
                <div class="each-input">
                    <label for="a">Option A:</label><br>
                    <input type="text" id="a" class="input-fields" placeholder="Option A">
                </div>
                <div class="each-input">
                    <label for="b">Option B:</label><br>
                    <input type="text" id="b" class="input-fields" placeholder="Option B">
                </div>
                <div class="each-input">
                    <label for="c">Option C:</label><br>
                    <input type="text" id="c" class="input-fields" placeholder="Option C">
                </div>
                <div class="each-input">
                    <label for="d">Option D:</label><br>
                    <input type="text" id="d" class="input-fields" placeholder="Option D">
                </div>
                <div class="each-input">
                    <label for="correct">Correct Answer:</label><br>
                    <input type="text" id="correct" class="input-fields" placeholder="Correct">
                </div>
                <p class="error-handler" id="error-handler"></p>
                <div id="btn-container" class="each-input">
                    <button id="submit" class="submit">Post</button>
                </div>
            </form>
        </div>
    </main>
    <script src="js/post.js"></script>
</body>
</html>